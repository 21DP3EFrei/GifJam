<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use App\Http\Middleware\Admin;
use App\Http\Middleware\CategoryExists;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => Admin::class,
            'realCategory' => CategoryExists::class
        ]);
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            AddLinkHeadersForPreloadedAssets::class,
        ]);
        $middleware->redirectTo('/');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();