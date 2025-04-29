<?php

use App\Http\Controllers\LikeController;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use App\Http\Middleware\Admin;
use App\Http\Middleware\CategoryExists;
use App\Http\Middleware\BlockUser;
use App\Http\Middleware\Localization;
use App\Http\Middleware\RandomMiddleware;
use App\Http\Middleware\MediaSearch;
use App\Http\Middleware\LikeMiddleware;
use Illuminate\Support\Facades\App;

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
            'realCategory' => CategoryExists::class,
            'blocked' => BlockUser::class,
            'localization' => Localization::class,
            'randomExists' => RandomMiddleware::class,
            'media' => MediaSearch::class,
            'like' => LikeMiddleware::class,            
        ]);
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            AddLinkHeadersForPreloadedAssets::class,
            Localization::class,
        ]);
        $middleware->redirectTo('/');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();