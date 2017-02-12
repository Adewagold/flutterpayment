<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//}); 

Route::get('/', [
	'uses'=> 'bankcontroller@getHomeBanks',
	'as'=>'home.index'
]);

Route::group(['prefix' => 'bank'], function() {
    //
    Route::get('/', [
	'uses'=> 'bankcontroller@getBanks',
	'as'=>'banks.index'
]);
    Route::get('/bvn/', [
	'uses'=> 'bankcontroller@getBvn',
	'as'=>'banks.bvn'
]);
    Route::post('/bvn/', [
	'uses'=> 'bankcontroller@postBvn',
	'as'=>'banks.bvn'
]);
    Route::get('/otp/', [
	'uses'=> 'bankcontroller@getOTP',
	'as'=>'verify.otp'
]);
    Route::post('/otp/', [
	'uses'=> 'bankcontroller@postOTP',
	'as'=>'verify.otp'
]);


Route::get('/card',[
	'uses'=> 'bankcontroller@getCard',
	'as'=> 'bank.card']);

Route::post('/card',[
	'uses'=> 'bankcontroller@postCard',
	'as'=> 'bank.card']);
});




Route::group(['prefix' =>'user'],function(){

Route::get('/signin',[
	'uses'=> 'usercontroller@signIn',
	'as'=> 'user.signin'
	]);

Route::post('/signin',[
	'uses'=> 'usercontroller@postSignIn',
	'as'=> 'user.signin'
	]);

Route::get('/signup', [
	'uses'=> 'usercontroller@signUp',
	'as'=> 'user.signup'
	]);

Route::post('/signup', [
	'uses'=> 'usercontroller@signUpPost',
	'as'=> 'user.signup'
	]);
});

Route::group(['middleware'=>'auth'], function(){

Route::get('/logout', [
	'uses'=>'usercontroller@getLogout',
	'as'=>'user.logout'
	]);

Route::group(['prefix'=>'dashboard'], function(){

	Route::get('/', [
		'uses'=>'usercontroller@getDashboard',
		'as'=> 'dashboard.index']);

});

});

