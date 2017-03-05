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

Route::get('/', function () {
   //return view('welcome');
	echo "<H1>Cello Resources for You!</H1>";
	$fingerMotion_url = url('fingerMotionBowIntro.mp4');
	echo "<a href=\"".$fingerMotion_url."\">Finger Motion on the Bow - An Introduction</a><br />";
	$gMaj_2Oct_url = url('gMajor2Octaves.mp4');
	echo "<a href=\"".$gMaj_2Oct_url."\">G Major Scale - 2 Octaves</a><br /><br /><br />";
	//$witches_url = url('test3');
	//echo "<a href=\"".$witches_url."\">Witch's Dance </a><br />";
	//$hunters_url = url('test3');
	//echo "<a href=\"".$hunters_url."\">Hunter's Chorus</a><br />";
});


Route::get('/fingerMotionBowIntro.mp4', 'VideoController@fingerMotionBowIntro');

Route::get('gMajor2Octaves.mp4', 'VideoController@gMajor2Octaves');

Route::get('bucketIndex', function() {
	$bucketIndex = new BucketList();

});

