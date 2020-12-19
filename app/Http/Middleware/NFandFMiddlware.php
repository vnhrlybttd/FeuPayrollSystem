<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

use Closure;

class NFandFMiddlware
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
        if ($request->user() && $request->user()->type != 'Faculty')
        {

        Alert::error('Warning', 'Restricted Page!');

        return new Response(view('unauthorized',['url' => url('/home')])->with('role', 'Faculty'));
        }

        return $next($request);
    }
}
