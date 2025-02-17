<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([

            'user' => UserMiddleware::class,  //this is new middleware that i created it 
            'admin' => AdminMiddleware::class,  //this is new middleware that i created it 

        ]);
        $middleware->validateCsrfTokens(except: [
            'payOnline',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {})->create();
