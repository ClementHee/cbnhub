<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\CheckCourseAccess;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->append(CheckCourseAccess::class);
        $middleware->alias([
            'superadmin' => \App\Http\Middleware\UserAdmin::class,
            'cbnhub' => \App\Http\Middleware\CBNHubLogin::class,
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
