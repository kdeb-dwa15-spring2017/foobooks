<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;
use App\User;
use App\Library\BucketList;


class AdminController extends Controller
{
    //get form to create a new student.
    public function newStudent() {

    	if (Auth::user()->name == 'Admin') {
    		return view('newstudent');
    		//return redirect()->action('Auth\RegisterController@showRegistrationForm');
    	}
    	else {
    		return redirect()->action('HomeController@indexLessons');
    	}
    	
    }

    public function postNewStudent(Request $request) {

    	$messages = [];

    	 # Validate the request data
    	$this->validate($request, [
        	'name' => 'required|min:3',
        	'email' => 'required|email',
        	'password' => 'required|alpha_num|min:6|max:12',
    	],  $messages);

    	dump($request);

    	 # Add new user/student to database
        //$book = new Book();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->action('AdminController@newstudent');
    }

    //get form to create a new lesson.
    public function newLesson() {

		    $students = User::all(['id', 'name']);
		    $bl= new BucketList();
    		$videos = $bl->makeList();
			dump($videos);
		    //return View::make('newlesson', compact('students', $students));
		    return View('newlesson')->with('students', $students)->with('videos', $videos);

    }
}
