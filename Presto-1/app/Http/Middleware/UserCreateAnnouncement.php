<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserCreateAnnouncement
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_revisor === 0 ) {
            return $next($request);
        } elseif(Auth::guest()) {
            return redirect('/login')->with(['error' => __('messages.warning_user_section')]);
        }

        
        return redirect('/')->with(['error' => __('messages.warning_user_register_section')]);
    }
}
