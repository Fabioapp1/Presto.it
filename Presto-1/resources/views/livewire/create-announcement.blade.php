
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-6 p-5">

            <div class="row">
                <div class="col-12 text-center pb-5">
                    <h1 class="display-2">{{__('create_ad.CreateAdTitle')}}</h1>
                </div>
            </div>

            @if(session()->has('message'))
                    <div class="flex flex-row justify-center my-2 alert alert-success">
                        {{ session('message') }}
                    </div>
            @endif
        
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                
                @csrf
                <div class="mb-3">
                    <label for="title">{{__('create_ad.titleAd')}}</label>
                    <input wire:model.live="title" type="text" class="form-control @error('title') is-invalid @enderror"> 
                    @error('title')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body">{{__('create_ad.description')}}</label>
                    <textarea wire:model.live="body" type="text" class="form-control @error('body') is-invalid @enderror"></textarea>
                    @error('body')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-3">
                  <input wire:model="temporary_images" type="file" multiple name="images" class="form-control @error('temporary_images') is-invalid @enderror @error('temporary_images.*') is-invalid @enderror" placeholder="img" />
                  @error('temporary_images')
                  {{ $message }}
                  @enderror

                  @error('temporary_images.*')
                  {{ $message }}
                  @enderror
                </div>
 
                @if(!empty($images))
                <div class="row">
                    <div class="col-12">
                        <p>{{__('create_ad.photoPreview')}}</p>
                        <div class="row border border-4 border-body-tertiary rounded py-4 mx-1 mb-3">
                            @foreach($images as $key => $image)
                            <div class="col my-3">
                                <div class="col-12 col-md-6 mx-auto rounded">
                                    <img class="img-fluid" src="{{ $image->temporaryUrl() }}" alt="Image">
                                </div>
                                <button type="button" class="btn btn-danger d-block text-center mt-2 mx-auto" wire:click="removeImage( {{ $key }})">{{__('create_ad.delete')}}</button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                    
                @endif
                
                <div class="mb-3">
                    <label for="price">{{__('create_ad.price')}}</label>
                    <input wire:model.live="price" type="number" step=".01" class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="category">{{__('categories.category')}}</label>
                    <select wire:model.defer="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">{{__('create_ad.chooseCategory')}}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ trans('categories.' . $category->name) }}</option>
                        @endforeach
                    </select>  
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </div>
        
                <button type="submit" class="btn btn-accent px-4 py-2">{{__('create_ad.create')}}</button>
        
            </form>

        </div>
    </div>