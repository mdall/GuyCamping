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
use App\Http\Controllers;
use App\Page;
use Illuminate\Support\Facades\View;

Route::get('/', function(){
    return redirect(url('/page/accueil'));
});
Route::get('/hebergement/lister', 'HebergementController@lister');

Route::resource('blog', 'BlogController');
Route::resource('page', 'PageController');
Route::resource('hebergement', 'HebergementController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);