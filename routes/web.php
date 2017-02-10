<?php

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

Route::get('/', [
	'uses' => 'NiceActionController@getHome',
	'as' => 'home'
]);

Route::get('/greet/{name?}', function($name = null) {
	return view('actions.greet')->with('name', $name); // /greet/JimiDARK
})->name('greet');

Route::get('/hug', function() {
	return view('actions.hug');
})->name('hug');

Route::get('/kiss', function() {
	return view('actions.kiss');
})->name('kiss');

Route::post('/', function(\Illuminate\http\Request $request) {
	if (isset($request['action']) && isset($request['name'])) {
		if (strlen($request['name']) > 0) {
			return view('actions.nice')->with(array('action' => $request['action'], 'name' => $request['name']));
		}
	}
	return redirect()->back();
})->name('benice');

Route::post('/login', [
	'uses' => 'UserController@postLogin',
	'as' => 'login'
]);

Route::get('/nice/{action}/{name}', [
	'uses' => 'NiceActionController@getNiceAction'
])->name('nice');

Route::post('/addaction', [
	'uses' => 'NiceActionController@postAddAction',
	'as' => 'addaction'
]);