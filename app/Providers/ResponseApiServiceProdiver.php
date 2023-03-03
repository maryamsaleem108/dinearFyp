<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResponseApiServiceProdiver extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro('result', function ($data = [], $message = '', $status = 200, $validate = null) {
            $message = __($message);
            $errors = request()->errors();
            $response = compact('data', 'message', 'validate', 'errors');
            return Response::json($response, $status, []);
        });
    }
}
