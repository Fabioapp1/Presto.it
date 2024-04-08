<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ResizeImage;
use App\Jobs\CropImage;
use App\Jobs\RemoveFaces;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\GoogleVisionLabelImage ;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $message;
    public $validated;
    public $category_id;
    public $temporary_images = [];
    public $images = [];
    public $announcement;

    protected $rules = [
        'title'=>'required|min:4',
        'body'=>'required|min:8',
        'price'=>'required|numeric|gt:0|max:1000000',
        // 'images.*'=>'required|image|max:2048', // 2MB Max
        // 'temporary_images.*'=>'image|max:2048', // 2MB Max
        // 'temporary_images'=>'required',
        'category_id'=>'required',
    ];

    protected $messages = [
        'required'=>'The field :attribute is required',
        'min'=>'The field :attribute is too short',
        'numeric'=>'The field :attribute should be a number',
        // 'temporary_images.required'=>'The image is required',
        // 'temporary_images.*.image'=>'Only image is accepted as file', 
        // 'temporary_images.*.max'=>'The image must be a maximum of 2 MB',
        // 'images.*.image'=>'The image must be an image',
        // 'images.*.max'=>'The image must be a maximum of 2 MB',
    ];


    public function updatedTemporaryImages()
    {
        // if($this->validate([
        //     'temporary_images.*'=>'image|max:12048',
        // ])) {
        foreach ($this->temporary_images as $image) 
            {
                $this->images[] = $image;
            }    
        // }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();
        $category = Category::find($this->category_id);

        $this->announcement = $category->announcements()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
        Auth::user()->announcements()->save($this->announcement);

        if(count($this->images)){
            foreach ($this->images as $image) {
                $newFilename = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store("$newFilename", 'public')]);

                RemoveFaces::withChain([
                   new CropImage($newImage->path , 400 , 400),
                   new ResizeImage($newImage->path , 1000 , 1000),
                   new GoogleVisionSafeSearch($newImage->id),
                   new GoogleVisionLabelImage ($newImage->id),
                ])->dispatch($newImage->id);
                
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        
        session()->flash('message', __('messages.success_create_ad'));
        $this->cleanForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category_id = '';
        $this->images = [];
        $this->temporary_images = [];
        
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
