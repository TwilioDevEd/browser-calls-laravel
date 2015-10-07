<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Services_Twilio_Capability as TwilioCapability;

class TokenController extends Controller
{
    /**
     * Create a new capability token
     *
     * @return \Illuminate\Http\Response
     */
    public function newToken(Request $request, TwilioCapability $capability)
    {
        $forPage = $request->input('forPage');
        $applicationSid = config('services.twilio')['applicationSid'];

        $capability->allowClientOutgoing($applicationSid);
        $token = $capability->generateToken();

        return response()->json(['token' => $token]);
    }
}
