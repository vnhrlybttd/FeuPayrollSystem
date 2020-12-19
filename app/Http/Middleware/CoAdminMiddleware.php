<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class CoAdminMiddleware
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

        if ($request->user() && $request->user()->type != 'Co-Admin')
        {

        Alert::error('Warning', 'Restricted Page!');

        return new Response(view('unauthorized',['url' => url('/home')])->with('role', 'Co-Admin'));
        }

    return $next($request);
    }
}
