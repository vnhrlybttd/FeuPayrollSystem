<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class DeveloperMiddleware
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
        if ($request->user() && $request->user()->type != 'Developer')
        {

        Alert::error('Warning', 'Restricted Page!');

        return new Response(view('unauthorized',['url' => url('/home')])->with('role', 'Developer'));
        }

        return $next($request);
    }
}
