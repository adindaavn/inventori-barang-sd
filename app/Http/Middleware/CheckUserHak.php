<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserHak
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$haks)
    {
        // if (Auth::check() && in_array(Auth::user()->user_hak, $haks)) {
        //     return $next($request);
        // }

        // return redirect()->route('home')->withErrors('You do not have permission to access this page.');

        // Check if the user is authenticated
        if (Auth::check()) {
            $userHak = Auth::user()->user_hak;

            // Define access rules based on user_hak
            $adminRoutes = [
                '/home', 
                '/logout',
                '/barang-tersedia',
                '/status-barang',
                '/pengembalian-barang',
                '/dipinjam',
                '/jenis-barang'
            ];
            $userRoutes = [
                '/home', 
                '/logout', 
                '/barang', 
                '/peminjaman', 
                '/pengembalian'
            ];

            if ($userHak === 'SU') {
                // SU users can access all routes
                return $next($request);
            }

            if ($userHak === 'admin' && in_array($request->path(), $adminRoutes)) {
                // Admin users can only access specific routes
                return $next($request);
            }

            if ($userHak === 'user' && in_array($request->path(), $userRoutes)) {
                // Regular users can only access specific routes
                return $next($request);
            }
        }

        // If the user doesn't have permission, redirect or show an error
        return redirect()->route('home')->withErrors('You do not have permission to access this page.');
    }

}
