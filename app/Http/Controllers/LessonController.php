<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\VideoGetter;
use App\Lesson;

class LessonController extends Controller
{
    //Return one lesson
    public function returnLesson() {
    	$lesson = Lesson::where('id', '=', '2')->first();
    	//$author = $book->author;
    	$student = $lesson->user;
    	dump($student);
    	$lessonData = [];
    	//dump($lesson->all());
		dump($lesson->id.' '.$lesson->semester.' '.$lesson->lesson_number.' '.$lesson->day.' '.$lesson->date.' '.$lesson->start_time.' '.$lesson->end_time.' '.$lesson->duration.' '.$lesson->notes.' '.$lesson->user_id);
		
		
		/*
		"id" => 3
        "created_at" => "2017-04-07 01:50:51"
        "updated_at" => "2017-04-07 01:50:51"
        "semester" => "Spring 2017"
        "lesson_number" => 8
        "day" => "Tuesday"
        "date" => "2017-03-28"
        "start_time" => "16:15:00"
        "end_time" => "17:00:00"
        "duration" => "00:00:45"
        "notes" => "pieces: Minuet #1, Hunter's Chorus"
        "user_id" => 1
        */
        $lessonVideos = [];
      	$count = 0;
		foreach($lesson->videos as $video) {
		    //array_push($lessonVideos, $video->video_name);
		    $count++;
		    $lessonVideos['video'.$count] = $video->video_name; 
		    dump($video->video_name);
		}
		//$data = array('firstKey' => 'firstValue', 'secondKey' => 'secondValue');
		//array_push($lessonData, $lesson->id, $lesson->semester, $lesson->lesson_number, $lesson->day, $lesson->date, $lesson->start_time, $lesson->end_time, $lesson->duration, $lesson->notes, $lesson->user_id, $lessonVideos);
		$lessonData = array('id' => $lesson->id, 'semester' => $lesson->semester, 'lessonNumber' => $lesson->lesson_number,
			'day'=> $lesson->day, 'date' => $lesson->date, 'start_time' => $lesson->start_time, 'end_time' => $lesson->end_time,
			'duration' => $lesson->duration, 'notes' => $lesson->notes, 'user_id' => $lesson->user_id, 'video_array' => $lessonVideos);
		dump($lessonData);

		return view('lesson')->with('lessonData', $lessonData);
    }

    //Return all lessons for one user
    public function returnAllLessons() {
    	$lessons = Lesson::with('videos')->get();

		foreach($lessons as $lesson) {
		    dump($lesson->id.' '.$lesson->notes);
		    foreach($lesson->videos as $video) {
		        dump($video->video_name);
		        //return redirect('video/{'$video->video_name'}');
		        //$videoOutput = new VideoGetter($video->video_name);
	    		//return $videoOutput; 
		   }

	   }
	}
}