<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket;

class TicketController extends Controller
{
    /**
     * Store a new ticket
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newTicket(Request $request)
    {
        $messages = [
            'required' => 'The :attribute is mandatory',
            'phone_number.regex' => 'The phone number must be in E.164 format'
        ];

        $this->validate(
            $request, [
                'name' => 'required',
                // E.164 format
                'phone_number' => 'required|regex:/^\+[1-9]\d{1,14}$/',
                'description' => 'required'
            ], $messages
        );

        $newTicket = new Ticket($request->all());
        $newTicket->save();

        $request->session()->flash(
            'status',
            "We've received your support ticket. We'll be in touch soon!"
        );

        return redirect()->route('home');
    }
}
