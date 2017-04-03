<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = ['fingerMotionBowIntro.mp4','gMajor.mp4'];

	    foreach($data as $tagName) {
	        $tag = new Tag();
	        $tag->name = $tagName;
	        $tag->save();
	    }
    }
}
