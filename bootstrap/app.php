<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\UserAuthentication;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\UserIntegrity;
use App\Http\Middleware\RegisterForm;
use App\Http\Middleware\CheckAbilities;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'Auth' => UserAuthentication::class,
            'role' => RoleMiddleware::class,
            'integrity' => UserIntegrity::class,
            'form' => RegisterForm::class,
            'abilities' => CheckAbilities::class,
            'ability' => CheckForAnyAbility::class,
            
        ]);
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
