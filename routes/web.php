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
	

	//echo "<H1>Cello Resources for You!</H1>";
	//$fingerMotion_url = url('fingerMotionBowIntro.mp4');
	//echo "<a href=\"".$fingerMotion_url."\">Finger Motion on the Bow - An Introduction</a><br />";
	//$gMaj_2Oct_url = url('gMajor2Octaves.mp4');
	//echo "<a href=\"".$gMaj_2Oct_url."\">G Major Scale - 2 Octaves</a><br /><br /><br />";

});

//Route::get('/video', 'VideoController@index')->name('video.index');




$bucket = 'debethunestudio';
		$sharedConfig = [
		    'region'  => 'us-west-2',
		    'version' => 'latest'
		];
		$sdk = new \Aws\Sdk($sharedConfig);
		$s3Client = $sdk->createS3();
		$result = $s3Client->listObjects(array('Bucket' => $bucket));
		//echo "Keys retrieved!<br /><br />";
		$keyArray = [];
		foreach ($result['Contents'] as $object) {
			if (!strstr($object['Key'],"logs/")) {
				//echo $object['Key'] . "<br />";
				array_push($keyArray, $object['Key']);
			}
			
		}
		//dump($keyArray);

	foreach($keyArray as $key) {
		//echo $key;
		//$currentURL = $key."_url";
		//echo "<a href=\"".$currentURL."\">".$key."</a><br />";
		//Route::get($key, 'VideoController@getVideo($key)');
		Route::get('/'.$key, 'VideoController@'.$key)->name('video-'.$key);
	}


//for($i = 0; $i < 100; $i++) {
//    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
//}




//Route::get('/fingerMotionBowIntro.mp4', 'VideoController@fingerMotionBowIntro');

//Route::get('gMajor2Octaves.mp4', 'VideoController@gMajor2Octaves');

//A route that accepts a variable from the bucketlist array in the route name and in the controller

/*
Route::get('bucketIndex', function() {
	$bucketIndex = new BucketList();

});
*/

