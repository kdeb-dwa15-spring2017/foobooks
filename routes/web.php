<?php

//require 'vendor/autoload.php';
require('../app/Video.php');

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
	
	//require  'Aws\S3\Exception\S3Exception';
	//use 'Aws\S3\Exception\S3Exception';

	$bucket = 'debethunestudio';
	//$keyname = 'G-Major.mp4';
	$keyname = 'Finger-Motion-Bow-Intro.mp4';
	//$keyname = 'test-image.jpg';
	$filepath = 'c:\xampp';
	$timeout = 10000;

	$sharedConfig = [
	    'region'  => 'us-west-2',
	    'version' => 'latest'
	];

	// Create an SDK class used to share configuration across clients.
	$sdk = new Aws\Sdk($sharedConfig);


	// Use an Aws\Sdk class to create the S3Client object.
	$s3Client = $sdk->createS3();
	
	/*
	$result = $s3Client->listBuckets();

	foreach ($result['Buckets'] as $bucket) {
	    echo $bucket['Name'] . "\n";
	}
	*/

	// Convert the result object to a PHP array
	/*
	$array = $result->toArray();
	dump($array);
	*/

	// Get an object.
	
	$result = $s3Client->getObject(array(
	    'Bucket' => $bucket,
	    'Key'    => $keyname,
	));

	$testHTML = "<H1>This is a test</H1><br /><br />";

	/* foreach($result as $ind_result) {
		echo($ind_result.'\n');
	} */
	//echo $result['ContentType'];
	//echo $result['@metadata']['effectiveUri'];
	//echo " <img src=\"https://s3-us-west-2.amazonaws.com/debethunestudio/test-image.jpg\" alt=\"test-image\">";
	//echo "<img src=".$result['@metadata']['effectiveUri'].">";

	header("Content-Type: {$result['ContentType']}");
	//body($testHTML);
    echo $result['Body'];

	/*
	foreach($result as $test) {
		echo($test);
		echo("\n");
	}
	*/
	//dump($result);
	

	// Get a range of bytes from an object.
	/*
	$result = $s3Client->getObject(array(
	    'Bucket' => $bucket,
	    'Key'    => $keyname,
	    'Range'  => 'bytes=0-99'
	));

	dump($result); 
	*/
	// Save object to a file.
	/*
	$result = $s3Client->getObject(array(
	    'Bucket' => $bucket,
	    'Key'    => $keyname,
	    'SaveAs' => $filepath
	)); */

	
	/*
	try {
	    // Get the object
	    $result = $s3Client->getObject(array(
	        'Bucket' => $bucket,
	        'Key'    => $keyname
	    ));

		    // Display the object in the browser
		    header("Content-Type: {$result['ContentType']}");
		    echo $result['Body'];
		} catch (S3Exception $e) {
		    echo $e->getMessage() . "\n";
	}
	*/
	


});

Route::get('gMajor2Octaves', function() {
	
	//require  'Aws\S3\Exception\S3Exception';
	//use 'Aws\S3\Exception\S3Exception';

	$bucket = 'debethunestudio';
	$keyname = 'G-Major.mp4';
	$filepath = 'c:\Users\Ellie\Desktop';
	$timeout = 10000;

	$sharedConfig = [
	    'region'  => 'us-west-2',
	    'version' => 'latest'
	];

	// Create an SDK class used to share configuration across clients.
	$sdk = new Aws\Sdk($sharedConfig);


	// Use an Aws\Sdk class to create the S3Client object.
	$s3Client = $sdk->createS3();
	
	
	// Get an object.
	
	$result = $s3Client->getObject(array(
	    'Bucket' => $bucket,
	    'Key'    => $keyname,
	));

	header("Content-Type: {$result['ContentType']}");
    echo $result['Body'];

});

Route::get('gMajor2Octaves-2', function() {
	
	//require  'Aws\S3\Exception\S3Exception';
	//use 'Aws\S3\Exception\S3Exception';
	$video = new Video('G-Major.mp4');
	/*
	$bucket = 'debethunestudio';
	$keyname = 'G-Major.mp4';
	$filepath = 'c:\Users\Ellie\Desktop';
	$timeout = 10000;

	$sharedConfig = [
	    'region'  => 'us-west-2',
	    'version' => 'latest'
	];

	// Create an SDK class used to share configuration across clients.
	$sdk = new Aws\Sdk($sharedConfig);


	// Use an Aws\Sdk class to create the S3Client object.
	$s3Client = $sdk->createS3();
	
	
	// Get an object.
	
	$result = $s3Client->getObject(array(
	    'Bucket' => $bucket,
	    'Key'    => $keyname,
	));
	*/
	dump($result);
	//header("Content-Type: {$result['ContentType']}");
    //echo $result['Body'];

});
