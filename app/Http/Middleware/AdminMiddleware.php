<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // dd($role);
        // Check if user is authenticated

        if (!Auth::check()) {
            return redirect('login');
        }

        // Check if the authenticated user has the correct role
         // Check the user's role
         if (Auth::user()->role !== $role) {
            return redirect('login')->withErrors(['message' => 'Access denied!']);
        }

        return $next($request);
    }
}
