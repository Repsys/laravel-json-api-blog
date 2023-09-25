<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use LaravelJsonApi\Core\Exceptions\JsonApiException;
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
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        JsonApiException::class,
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(
            \LaravelJsonApi\Exceptions\ExceptionParser::make()->renderable()
        );
    }

//    public function render($request, $e): \Illuminate\Http\Response|JsonResponse|Response
//    {
//        if ($request->is('api/*') || $request->wantsJson()) {
//            if ($e instanceof NotFoundHttpException) {
//                return JResponse::error('Page Not Found', [], Response::HTTP_NOT_FOUND);
//            }
//            if ($e instanceof ModelNotFoundException) {
//                $modelName = class_basename($e->getModel());
//                return JResponse::error($modelName.' Not Found', [], Response::HTTP_NOT_FOUND);
//            }
//            if ($e instanceof HttpException) {
//                return JResponse::error($e->getMessage(), [], $e->getStatusCode());
//            }
//
//            if ($e instanceof ApplicationErrorException) {
//                if (App::hasDebugModeEnabled()) {
//                    return JResponse::errorFromException($e);
//                }
//                return JResponse::error('Internal Server Error', [], $e->getCode());
//            }
//
//            if ($e instanceof BusinessErrorException) {
//                return JResponse::error($e->getMessage(), $e->getErrors(), $e->getCode());
//            }
//        }
//
//        return parent::render($request, $e);
//    }
}
