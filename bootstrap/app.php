<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        api: __DIR__.'/../routes/api.php', // pastikan route api didefinisikan di sini
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Tambahkan Sanctum middleware di grup 'api'
        $middleware->group('api', [
            EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class
    ]);
    $middleware->validateCsrfTokens(except: [
        '/*'
        ]);
        
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
