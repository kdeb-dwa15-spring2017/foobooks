<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Library\BucketList;

class IndexController extends Controller
{
    //
    
     public function getIndex() {
    	$bl= new BucketList();
    	$keyArray = $bl->makeList();
		echo gettype($bl);
		echo gettype($keyArray);
		dump($bl);
    	dump($keyArray);
    	return view('welcome')->with('keyArray', $keyArray);
    	//return $bl;
    }
    /*
    public function getIndex() {

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
		//dump $keyArray[0];
		//http://stackoverflow.com/questions/35326115/laravel5-how-to-pass-array-to-view
		//return view("welcome", $keyArray);
		//return view('store')->with('store', $store);
		return view('welcome')->with('keyArray', $keyArray);
    }
    */
}
