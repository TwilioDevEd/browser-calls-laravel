<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Twilio\Jwt\ClientToken;

class TokenController extends Controller
{

    public function __construct(ClientToken $clientToken)
    {
        $this->clientToken=$clientToken;
    }

    /**
     * Create a new capability token
     *
     * @return \Illuminate\Http\Response
     */
    public function newToken(Request $request)
    {
        $forPage = $request->input('forPage');
        $applicationSid = config('services.twilio')['applicationSid'];
        $this->clientToken->allowClientOutgoing($applicationSid);

        if ($forPage === route('dashboard', [], false)) {
            $this->clientToken->allowClientIncoming('support_agent');
        } else {
            $this->clientToken->allowClientIncoming('customer');
        }

        $token = $this->clientToken->generateToken();
        return response()->json(['token' => $token]);
    }
}
