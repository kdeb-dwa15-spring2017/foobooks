<?php

//require 'vendor/autoload.php';
require('Video.php');

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
	$fingerMotion_url = url('fingerMotionBowIntro');
	echo "<a href=\"".$fingerMotion_url."\">Finger Motion on the Bow - An Introduction</a><br />";
	$gMaj_2Oct_url = url('gMajor2Octaves');
	echo "<a href=\"".$gMaj_2Oct_url."\">G Major Scale - 2 Octaves</a><br /><br /><br />";
	//$witches_url = url('test3');
	//echo "<a href=\"".$witches_url."\">Witch's Dance </a><br />";
	//$hunters_url = url('test3');
	//echo "<a href=\"".$hunters_url."\">Hunter's Chorus</a><br />";
});

Route::get('test1', function() {
	return("in the test route");
});


Route::get('test2', function() {
	

	$s3 = new Aws\S3\S3Client([
	    'version' => 'latest',
	    'region'  => 'us-west-2'
	]);

	return $s3;
});

Route::get('fingerMotionBowIntro', function() {
	$video = new Video('Finger-Motion-Bow-Intro.mp4');

});

Route::get('gMajor2Octaves', function() {
	$video = new Video('G-Major.mp4');

});

