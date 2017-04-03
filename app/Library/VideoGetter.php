<?php 
namespace App\Library;

//use Aws\S3\S3Client;
require '../vendor/autoload.php';

//http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/basic-usage.html
//http://docs.aws.amazon.com/AmazonS3/latest/dev/RetrieveObjSingleOpPHP.html

class VideoGetter {

	#Properties
	
	#Methods
	function __construct($keyname) {
		$bucket = 'debethunestudio';
		$sharedConfig = [
		    'region'  => 'us-west-2',
		    'version' => 'latest'
		];
		$sdk = new \Aws\Sdk($sharedConfig);
		$s3Client = $sdk->createS3();
		$this->$keyname = $keyname;
		$result = $s3Client->getObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $keyname,
		));
		header("Content-Type: {$result['ContentType']}");
    	echo $result['Body'];
	}

}
