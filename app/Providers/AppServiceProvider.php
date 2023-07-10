<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\Environment\Environment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '56dr8xzvbt46pjpj',
                    'publicKey' => 'pnt4x64qmv9hx2v6',
                    'privateKey' => '21b30461ffc74518be3dc49c41d54301',
                ]
            );
        });
    }
}
