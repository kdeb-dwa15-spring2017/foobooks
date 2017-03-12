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

	return view('welcome');
});


Route::get('/video_test', 'IndexController@getIndex');
//Route::get('/video_test', 'IndexController@getIndex')->name('index');


Route::get('/video', function () {
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
		//$keyArray = new BucketList();
		//dd($keyArray);

		echo "<H1>Cello Resources for You!</H1>";
		foreach($keyArray as $key) {
			echo "<a href=\"".$key."\">".$key."</a><br />";
		}
});


Route::get('test', function () {
		//dump($bl);
		//$a = [];
		$a = new BucketList;
		echo gettype($a);
		//$a_array = array($a);
		//echo gettype($a_array);
		//dump($a_array);
		

		
		/*
		foreach($a_array as $b) {
			echo $b;
		}*/

		//dd($a);
});



		
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
		//$keyArray = new BucketList();
		//dd($keyArray);

		foreach($keyArray as $key) {
			Route::get('/{key}', 'VideoController@getVideo');
		}

		/*
		Route::get('/video/{key}', function($key) 
    	{
        	return 'Key is ' . $key;
    	});
    	*/






