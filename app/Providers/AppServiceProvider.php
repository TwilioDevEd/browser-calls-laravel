<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Twilio\Jwt\ClientToken;

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
            ClientToken::class, function ($app) {
                $accountSid = config('services.twilio')['accountSid'];
                $token = config('services.twilio')['authToken'];

                return new ClientToken($accountSid, $token);
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
