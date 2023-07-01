<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (NotFoundHttpException  $e, $request) {
            if ($request->wantsJson() || $request->is("api/*")) {
                return response()->json(['message' => 'Request tidak ditemukan.', 'status_code' => Response::HTTP_NOT_FOUND], 404);
            }
        });

        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json(['message' => 'Silakan login terlebih dahulu.', 'status_code' => Response::HTTP_UNAUTHORIZED], 401);
            }
        });

        $this->renderable(function (RouteNotFoundException $e, $request) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json(['message' => 'Route Not Found', 'status_code' => Response::HTTP_UNAUTHORIZED], 401);
            }
        });
    }
}
