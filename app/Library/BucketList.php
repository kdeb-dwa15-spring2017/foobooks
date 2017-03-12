<?php 
namespace App\Library;

//use Aws\S3\S3Client;
require '../vendor/autoload.php';

//http://docs.aws.amazon.com/AmazonS3/latest/dev/ListingObjectKeysUsingPHP.html

class BucketList {

	#Properties
	#Methods
	/*
	function __construct() {
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
		//http://stackoverflow.com/questions/4345554/convert-php-object-to-associative-array
		//dump($keyArray);
		//echo gettype($keyArray);
		//foreach ($keyArray as $a) {
		//	echo $a.'<br />';
		//}
		//return $keyArray;
		dump($keyArray);
		//return (['keyArray' => $keyArray]);
		return('*$keyArray');
		 //['models' => $models]
	}
	*/

	function makeList(): array {
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
		//http://stackoverflow.com/questions/4345554/convert-php-object-to-associative-array
		//dump($keyArray);
		//echo gettype($keyArray);
		//foreach ($keyArray as $a) {
		//	echo $a.'<br />';
		//}
		//return $keyArray;
		dump($keyArray);
		//return (['keyArray' => $keyArray]);
		return($keyArray);
		 //['models' => $models]
	}

	

}