<?php

//require 'vendor/autoload.php';
//use App;
use App\Library\Video;
use App\Library\BucketList;
//require('../app/Video.php');


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
/*
Route::get('/', function () {

	return view('welcome');
});
*/

Route::get('/', 'IndexController@getIndex');

//Route::get('/video_test', 'IndexController@getIndex')->name('index');

Route::get('/{key}', 'VideoController@getVideo');

		





