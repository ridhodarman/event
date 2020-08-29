<?php

namespace App\Http\Middleware;
use App\Agen;
use Auth;

use Closure;

class AksesAgen
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
            $user = Auth::user()->id;
            $agen = Agen::where('user_id', $user)->first();

            if ($agen) {
                return $next($request);
            }

        }
        return redirect()->route('agen_403');
    }
}
