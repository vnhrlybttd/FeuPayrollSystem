<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class NonFacultyMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check())
        {
            if (Auth::User()->status != 1)
            {
                Auth::logout();
                return redirect()->to('/')->with('warning', 'Your Account has been Deactivated.');
            }
        }



        if(Auth::user()->type = "Non-Faculty"){
        if ($request->user() && $request->user()->type != 'Non-Faculty')
        {

        Alert::error('Warning', 'Restricted Page!');

        return new Response(view('unauthorized',['url' => url('/home')])->with('role', 'Non-Faculty'));
     
        }
    }
    elseif(Auth::user()->type = "Faculty" ){
        if ($request->user() && $request->user()->type != 'Faculty')
        {

        Alert::error('Warning', 'Restricted Page!');

        return new Response(view('unauthorized',['url' => url('/home')])->with('role', 'Faculty'));
     
        }
        
    }
        
       

        return $next($request);
    }
}
