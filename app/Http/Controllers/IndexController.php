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
		//echo gettype($bl);
		//echo gettype($keyArray);
		//dump($bl);
    	//dump($keyArray);
    	return view('welcome')->with('keyArray', $keyArray);
    }
}
