<?php

use \App\Ticket;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post(
    '/token',
    ['uses' => 'TokenController@newToken', 'as' => 'new-token']
);
Route::get(
    '/dashboard',
    ['uses' => 'DashboardController@dashboard', 'as' => 'dashboard']
);
Route::get(
    '/', ['as' => 'home', function () {
        return response()->view('index');
    }]
);
Route::resource('ticket', 'TicketController', ['only' => ['store']]);
