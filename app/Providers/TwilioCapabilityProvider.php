<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Services_Twilio_Capability;

class TwilioCapabilityProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Services_Twilio_Capability', function ($app) {
                $accountSid = config('services.twilio')['accountSid'];
                $token = config('services.twilio')['authToken'];

                return new Services_Twilio_Capability($accountSid, $token);
            }
        );
    }
}
