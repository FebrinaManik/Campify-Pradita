<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Pastikan ini ada
use Symfony\Component\HttpFoundation\Response;

class IsVendor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN user tersebut adalah vendor
        if (Auth::check() && Auth::user()->is_vendor) {
            // Jika ya, izinkan melanjutkan
            return $next($request);
        }

        // Jika tidak, tendang kembali ke dashboard biasa dengan pesan error
        return redirect('/dashboard')->with('error', 'Akses ditolak. Anda bukan Vendor.');
    }
}