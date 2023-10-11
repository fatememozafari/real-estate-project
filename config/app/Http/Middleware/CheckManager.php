<?php

namespace App\Http\Middleware;

use App\Models\RealEstate;
use Closure;
use Illuminate\Http\Request;

class CheckManager
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        if ($request->realEstate->user_id != auth()->user()->id) {
            return redirect()->route('user.dashboard');
        }

        return $next($request);
    }
}
