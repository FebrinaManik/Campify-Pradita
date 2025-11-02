<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware; // <-- Pastikan ini ada

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // =============================================
        //    BLOK PENDAFTARAN MIDDLEWARE
        // =============================================
        $middleware->alias([
            'is.vendor' => \App\Http\Middleware\IsVendor::class,
        ]);
        // =============================================

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();