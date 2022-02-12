<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CreateMessage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->id == auth()->id()) {

            return redirect('home')->with('error', 'You are not authorized to view this page');
        }
        return $next($request);
    }
}
