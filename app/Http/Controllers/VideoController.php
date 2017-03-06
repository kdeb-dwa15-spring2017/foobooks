<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Library\Video;


class VideoController extends Controller
{
    //
    /*
    public function fingerMotionBowIntro() {
    	$video = new Video('fingerMotionBowIntro.mp4');
    	return $video;
    }

    public function gMajor2Octaves() {
    	$video = new Video('G-Major.mp4');
    	return $video;
    }
    */

    public function getVideo($key) {
    	$this->key = $key;
    	$video = new Video($key);
    	return $video;
    }
}
