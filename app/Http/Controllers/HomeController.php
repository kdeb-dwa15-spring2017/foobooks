<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Library\BucketList;
use Auth;
use App\Lesson;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dump( $request->user());
        $user = $request->user();
        $id = ($user['attributes']['id']);
        //dump( $request->user['attributes']['id']);
        $bl= new BucketList();
        $keyArray = $bl->makeList();
        //echo gettype($bl);
        //echo gettype($keyArray);
        //dump($bl);
        //dump($keyArray);
        return view('home')->with('keyArray', $keyArray)->with('id', $id);
        //return view($id);
    }
    

    public function indexLessons()
    {

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
            return view('home')->with('lessons', $lessons)->with('user', $user);
        }
        else {
            echo("not logged in");
        }
    }
    
}

