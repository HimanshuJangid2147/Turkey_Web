<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        // Add this new line to load your admin routes
        then: function () {
            Route::middleware('web')
                 ->group(base_path('routes/admin.php'));
        },
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Your middleware aliases and redirects can remain as they were
        $middleware->alias([
            'auth.admin' => \App\Http\Middleware\AdminAuthenticate::class,
        ]);

        $middleware->redirectGuestsTo(function ($request) {
            if ($request->routeIs('admin.*')) {
                return route('admin.login.form');
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
