<?php
class Video {

	#Properties
	
	#Methods
	function __construct($keyname) {
		$bucket = 'debethunestudio';
		$sharedConfig = [
		    'region'  => 'us-west-2',
		    'version' => 'latest'
		];
		$sdk = new Aws\Sdk($sharedConfig);
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