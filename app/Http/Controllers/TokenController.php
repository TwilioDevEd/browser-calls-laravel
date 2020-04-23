<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;

class TokenController extends Controller
{
    
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken=$accessToken;
    }/**
     * Create a new capability token
     *
     * @return \Illuminate\Http\Response
     */
    public function newToken(Request $request)
    {
        $forPage = $request->input('forPage');
        $accountSid = config('services.twilio')['accountSid'];
        $applicationSid = config('services.twilio')['applicationSid'];
        $apiKey = config('services.twilio')['apiKey'];
        $apiSecret = config('services.twilio')['apiSecret'];

        if ($forPage === route('dashboard', [], false)) {
            $this->accessToken->setIdentity('support_agent');
        } else {
            $this->accessToken->setIdentity('customer');
        }

        // Create Voice grant
        $voiceGrant = new VoiceGrant();
        $voiceGrant->setOutgoingApplicationSid($applicationSid);

        // Optional: add to allow incoming calls
        $voiceGrant->setIncomingAllow(true);

        // Add grant to token
        $this->accessToken->addGrant($voiceGrant);

        // render token to string
        $token = $this->accessToken->toJWT();

        return response()->json(['token' => $token]);
    }
}
