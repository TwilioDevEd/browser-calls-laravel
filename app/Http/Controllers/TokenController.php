<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Twilio\Jwt\ClientToken;

class TokenController extends Controller
{
    /**
     * Create a new capability token
     *
     * @return \Illuminate\Http\Response
     */
    public function newToken(Request $request, ClientToken $clientToken)
    {
        $forPage = $request->input('forPage');
        $applicationSid = config('services.twilio')['applicationSid'];
        $clientToken->allowClientOutgoing($applicationSid);

        if ($forPage === route('dashboard', [], false)) {
            $clientToken->allowClientIncoming('support_agent');
        } else {
            $clientToken->allowClientIncoming('customer');
        }

        $token = $clientToken->generateToken();
        return response()->json(['token' => $token]);
    }
}
