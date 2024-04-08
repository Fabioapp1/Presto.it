<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
   public function home() 
   {
      $announcements = Announcement::orderBy('created_at', 'DESC')->where('is_accepted', true)->take(6)->get();
      return view('home', compact('announcements'));
   }

   public function categoryShow(Category $category)
   {
      return view('category-show', compact('category'));
   }

   public function searchAnnouncements(Request $request)
   {

      $searchCategory = explode(',', $request->inputCategorySearch);

      $query = Announcement::query()->where('is_accepted', true);

      if ($request->inputSearch && $searchCategory[0]) {
         $query->where('title', 'LIKE', '%' . $request->inputSearch . '%')
               ->where('category_id', $searchCategory[0]);
      } elseif ($request->inputSearch) {
         $query->where('title', 'LIKE', '%' . $request->inputSearch . '%');
      } elseif ($searchCategory[0]) {
         $query->where('category_id', $searchCategory[0]);
      }

      $announcements = $query->paginate(12);


      return view('announcements.search', [
         'announcements' => $announcements,
         'inputSearch' => $request->inputSearch,
         'nameCategory' => $searchCategory,
         '$nameCategory' => $searchCategory[1]
      ]);

   }


   public function setLocale($lang)
   {
      session()->put('locale' , $lang);
      return redirect()->back();
   }

   public function aboutUs() 
   {
      return view('footer.about-us');
   }

   public function contactUs() 
   {
      return view('footer.contact-us');
   }

   public function products() 
   {
      return view('footer.products');
   }

   public function services() 
   {
      return view('footer.services');
   }

   public function termAndConditions() 
   {
      return view('footer.term-conditions');
   }

   public function privacy() 
   {
      return view('footer.privacy');
   }
}
