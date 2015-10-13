<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $tickets = Ticket::all();
        return view('supportDashboard', ['tickets' => $tickets]);
    }
}
