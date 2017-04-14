<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\VideoGetter;
use App\Lesson;
use Auth;

class LessonController extends Controller
{
    //Return one lesson
    public function returnLesson() {
    	if (Auth::id()) {
	    	$lesson = Lesson::where('user_id', '=', '1')->first();
	   		dump(Auth::id());
	    	$student = $lesson->user;
	    	dump($student['name']);
	    	$lessonData = [];
	    	//dump($lesson->all());
			dump($lesson->id.' '.$lesson->semester.' '.$lesson->lesson_number.' '.$lesson->day.' '.$lesson->date.' '.$lesson->start_time.' '.$lesson->end_time.' '.$lesson->duration.' '.$lesson->notes.' '.$lesson->user_id);
			

			/*
			$books = Book::with('author')->get();

			foreach($books as $book) {
			    echo $book->author->first_name.' '.$book->author->last_name.' wrote '.$book->title.'<br>';
			}

			dump($books->toArray());
			*/
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
			$lessonData = array('student_name' => $student["name"], 'id' => $lesson->id, 'semester' => $lesson->semester, 'lessonNumber' => $lesson->lesson_number,
				'day'=> $lesson->day, 'date' => $lesson->date, 'start_time' => $lesson->start_time, 'end_time' => $lesson->end_time,
				'duration' => $lesson->duration, 'notes' => $lesson->notes, 'user_id' => $lesson->user_id, 'video_array' => $lessonVideos);
			dump($lessonData);

			return view('lesson')->with('lessonData', $lessonData);
		}
		else {
			return view('welcome');
		}
    }

    //Return all lessons for one user
    /*
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
	} */

	public function returnAllLessons() {
		
		if (Auth::user()) {
			$user = Auth::user();

			$lessons = Lesson::where('user_id', $user->id)
					->with('videos') ->get();
			
			foreach($lessons as $lesson) {
			    dump($lesson->id.' '.$lesson->notes);
			    foreach($lesson->videos as $video) {
			        dump($video->video_name);
			        //return redirect('video/{'$video->video_name'}');
			        //$videoOutput = new VideoGetter($video->video_name);
		    		//return $videoOutput; 
			 	}
			 }
			/*
			$flights = App\Flight::where('active', 1)
	               ->orderBy('name', 'desc')
	               ->take(10)
	               ->get();
	        */
	    }
	    else {
	    	echo("not logged in");
	    }
	       
	}
}