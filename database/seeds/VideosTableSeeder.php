<?php
use App\Video;
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

	    foreach($data as $videoName) {
	        $video = new Video();
	        $video->video_name = $videoName;
	        $video->save();
	    }
    }
}
