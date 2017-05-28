<?php
use App\Lesson;
use App\Video;
use Illuminate\Database\Seeder;

class LessonVideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        # First, create an array of all the books we want to associate tags with
	    # The *key* will be the book title, and the *value* will be an array of tags.
	    $lessons =[
	        '9' => ['fingerMotionBowIntro.mp4','gMajor.mp4'],
	        '8' => ['fingerMotionBowIntro.mp4'],
	        '10' => ['gMajor.mp4']
	    ];

	    # Now loop through the above array, creating a new pivot for each book to tag
	    foreach($lessons as $key => $videos) {

	        # First get the book
	        $lesson = Lesson::where('lesson_number','=',$key)->first();

	        # Now loop through each tag for this book, adding the pivot
	        foreach($videos as $videoName) {
	            $video = Video::where('video_name','LIKE',$videoName)->first();

	            # Connect this tag to this book
	            $lesson->videos()->save($video);
	        }

	    }
    }
}
