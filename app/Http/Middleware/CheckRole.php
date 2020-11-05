<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if(in_array($request->user()->role, $roles)){
            return $next($request);
        }
        else{
            return redirect(route('login'))->withErrors(['message' => "Maaf, anda harus login terlebih dahulu."]);
        }
        //return redirect('/');

    }
}