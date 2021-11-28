<?php

namespace App\Exceptions;

use App\Helpers\Telegram;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Http;
use Throwable;

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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */

    protected $telegram;

    public function __construct(Container $container, Telegram $telegram)
    {
        parent::__construct($container);
        $this->telegram = $telegram;
    }

    public function report(Throwable $e)
    {
        $data = [
            'description' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ];
        $this->telegram->sendMessage(env('REPORT_TELEGRAM_ID'), (string)view('report', $data));

    }

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
