<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;



class SuperAdminMiddleware
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

      
        
        if ($request->user() && $request->user()->type != 'Super Admin')
        {

        Alert::error('Warning', 'Restricted Page!');

        return new Response(view('unauthorized',['url' => url('/home')])->with('role', 'Super Admin'));
        }

        return $next($request);
    }
}
