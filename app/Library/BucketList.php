<?php 
namespace App\Library;

//use Aws\S3\S3Client;
require '../vendor/autoload.php';

//http://docs.aws.amazon.com/AmazonS3/latest/dev/ListingObjectKeysUsingPHP.html

class BucketList {

	#Properties
	
	#Methods
	function __construct() {
		$bucket = 'debethunestudio';
		$sharedConfig = [
		    'region'  => 'us-west-2',
		    'version' => 'latest'
		];
		$sdk = new \Aws\Sdk($sharedConfig);
		$s3Client = $sdk->createS3();
		$result = $s3Client->listObjects(array('Bucket' => $bucket));
		echo "Keys retrieved!<br /><br />";
		foreach ($result['Contents'] as $object) {
			if (!strstr($object['Key'],"logs/")) {
				echo $object['Key'] . "<br />";
			}
			
		}
	}

}