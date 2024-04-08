<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;


class RevisorController extends Controller
{
    public function index() 
    {

        $announcement_to_check = Announcement::where('is_accepted', null)->first();

        return view('revisor.index', [ 'announcements' => Announcement::all(), 'announcement_to_check' => $announcement_to_check]);
        // if (auth()->user()->is_revisor == 1){
        //     $announcement_to_check = Announcement::where('is_accepted', null)->first();
        //     return view('revisor.index', compact('announcement_to_check'));
        // } else {
        //     return redirect()->to('/');
        //     // abort(403);
        // }
        
    }

    public function acceptAnnouncement(Announcement $announcement) 
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('success', __('messages.success_accept'));
    }

    
    public function rejectAnnouncement(Announcement $announcement) 
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('success', __('messages.success_reject'));
    }

    public function toReviseAnnouncement(Announcement $announcement) 
    {
        $announcement->setAccepted(null);
        return redirect()->back()->with('success', __('messages.success_revise'));
    }

    public function toDeleteAnnouncement(Announcement $announcement) 
    {
        $announcement->delete();
        return redirect()->back()->with('success', __('messages.success_delete'));
    }

    public function jobRevisor()
    {
        return view('revisor.job');
    }

    public function becomeRevisor(User $user, Request $request)
    {
        //\Illuminate\Support\Facades\Mail::to('admin@presto.it')
           //->send(new \App\Mail\BecomeRevisor($user->name, $user->email, $request->message));
        
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $request));
        return redirect()->back()->with('success', __('messages.success_become_revisor'));
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ["email" => $user->email]);
        return redirect('/')->with('success', __('messages.success_make_revisor', ['name' => $user->name]));
    }


}
