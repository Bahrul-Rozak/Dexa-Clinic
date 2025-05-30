<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsPatient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     $user = auth()->guard('patient')->user();

    //     if (!$user || !$user->is_patient) {
    //         return redirect()->route('dashboard')->with('error', 'Access Denied! Patient Only');
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->guard('patient')->check()) {
            return redirect()->route('patient.login')->with('error', 'Please login first!');
        }
        return $next($request);
    }
}
