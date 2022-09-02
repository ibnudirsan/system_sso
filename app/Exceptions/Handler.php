<?php

namespace App\Exceptions;

use Throwable;
use App\Traits\handleHttp;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        /**
        * If the status code is 500 and other than 500.
        */
        if ($request->is('api/*')) {
            $code = method_exists($exception, 'getStatusCode');
            if (method_exists($exception, 'getStatusCode')) {
                $statusCode = $this->prepareException($exception)->getStatusCode();
                return handleHttp::HandleCode($statusCode);
            } else {
                    $statusCode = 500;
                    return handleHttp::HandleCode($statusCode);
            }
        }

        if ($request->is('api/*') && auth('sanctum')->check() == false || empty($request->header('Authorization'))){

            $statusCode = 403;
                return handleHttp::HandleCode($statusCode);
        }
            return parent::render($request, $exception);
    }
}
