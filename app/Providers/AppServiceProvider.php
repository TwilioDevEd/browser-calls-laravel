<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Twilio\Jwt\AccessToken;

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
        $this->app->bind(
            AccessToken::class,
            function ($app) {
                $accountSid = config('services.twilio')['accountSid'];
                $apiKey = config('services.twilio')['apiKey'];
                $apiSecret = config('services.twilio')['apiSecret'];

                return new AccessToken($accountSid, $apiKey, $apiSecret, 3600, 'identity');
            }
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
