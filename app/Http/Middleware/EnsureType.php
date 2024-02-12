<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
        if ($request->user()->hasType($type)) {
            return $next($request);
        }

        if(Auth::user())
        {
            return redirect(route('dashboard'))->with('notAllowed', "You don't have permission to access the page.");
        }

        return redirect(route('loginView'))->with('notAllowed', "You don't have permission to access the page.");
    }
}
