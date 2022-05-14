<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    
    protected $dontReport = [
        //
    ];

    
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json([
                "respuesta" => 0,
                "error" => "Sin autenticación, No tiene permisos para acceder a este recurso."
            ], 401);
        }
    }

    public function render($request, Throwable $exception)
    {
        if($exception instanceof ModelNotFoundException)
        {
            return response()->json([
                "respuesta" => 0,
                "error" => "Error! cuenta invalida" 
            ], 404);
        }
    }
}