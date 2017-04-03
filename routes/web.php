<?php

//require 'vendor/autoload.php';
//use App;
use App\Library\Video;
use App\Library\BucketList;
//require('../app/Video.php');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	return view('welcome');
});


Auth::routes();
/* Overrides POST logout that comes by default in Laravel */
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index');

Route::get('video', 'IndexController@getIndex')->name('videoList')->middleware('auth');

Route::get('video/{key}', 'VideoController@getVideo')->name('videoInd')->middleware('auth');



/* Login status tester below */
Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user)
        dump($user->toArray());
    else
        dump('You are not logged in.');

    return;
});

Route::get('/combinations', function() {
	$a = [0,1,2,3,4,5,6,7,8,9];

	foreach($a as $first_term) {
		//echo($first_term."<br />");
		foreach($a as $second_term) {
			//echo($first_term.$second_term."<br />");
			foreach($a as $third_term) {
				//echo($first_term.$second_term.$third_term."<br />");
				foreach($a as $fourth_term){
					echo($first_term.$second_term.$third_term.$fourth_term."<br />");
				}//end of fourth foreach
			}//end of third foreach
		}//end of second foreach
	}//end of first foreach
});


/* DB Tester below */

/*
Route::get('/debug', function() {

	echo '<pre>';

	echo '<h1>Environment</h1>';
	echo App::environment().'</h1>';

	echo '<h1>Debugging?</h1>';
	if(config('app.debug')) echo "Yes"; else echo "No";

	echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
	//print_r(config('database.connections.mysql'));
/*
	echo '<h1>Test Database Connection</h1>';
	try {
		$results = DB::select('SHOW DATABASES;');
		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
		echo "<br><br>Your Databases:<br><br>";
		print_r($results);
	}
	catch (Exception $e) {
		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
	}

	echo '</pre>';

});
*/

//Drop & Rebuild Database in Local
if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database cello_resources');
        //DB::statement('CREATE database cello_resources');

        return 'Dropped & created cello_resources';
    });

};

