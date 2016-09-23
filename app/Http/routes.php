<?php

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

Route::get('/', function () {
    return view('welcome');
});





Route::auth();

Route::get('/home', 'HomeController@index');

//customers controller
Route::get('/customers/add', 'CustomerController@create');
Route::post('/customers/save','CustomerController@store');
Route::get('/customers/read','CustomerController@index');
Route::get('//customers/old','CustomerController@old');
Route::get('/customers/clear','CustomerController@index');
Route::get('getclear/{id}', 'CustomerController@show');
Route::get('clear/{id}', 'CustomerController@edit');

//        $customers = \App\customer::where('status',1)->get();
        $num_of_customers = \App\customer::where('status',1)->count();
        $num_of_old_customers = \App\customer::where('status',0)->count();
        View::share('num_of_customers', $num_of_customers);
        View::share('num_of_old_customers', $num_of_old_customers);


        $free_rooms = \App\Room::where('status',0)->count();
        View::share('free_rooms',$free_rooms);




// rooms controllers
Route::get('/rooms','RoomsController@create');
Route::post('/rooms/save','RoomsController@store');
Route::get('/rooms/read','RoomsController@index');
Route::get('/rooms/free',function (){
    $rooms  = \App\Room::where('status',true)->get();
    return view('rooms.free')->with('freerooms',$rooms);
});

Route::get('/rooms/occupied',function (){
    $rooms  = \App\Room::where('status',TRUE)->get();
    return view('rooms.occuppied')->with('occupiedrooms',$rooms);
});



