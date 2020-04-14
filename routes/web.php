<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get(
    '/', ['as' => 'home', function () {
        return response()->view('index');
    }]
);
Route::post(
    '/token',
    ['uses' => 'TokenController@newToken', 'as' => 'new-token']
);
Route::get(
    '/dashboard',
    ['uses' => 'DashboardController@dashboard', 'as' => 'dashboard']
);
Route::post(
    '/ticket',
    ['uses' => 'TicketController@newTicket', 'as' => 'new-ticket']
);
Route::post(
    '/support/call',
    ['uses' => 'CallController@newCall', 'as' => 'new-call']
);
