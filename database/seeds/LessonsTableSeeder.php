<?php
use App\User;
use App\Lesson;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*
        $author_id = Author::where('last_name','=','Fitzgerald')->pluck('id')->first();

	    DB::table('books')->insert([
	    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'title' => 'The Great Gatsby',
	    'author_id' => $author_id,
	    'published' => 1925,
	    'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
	    'purchase_link' => 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565',
	    ]);
	    */

	    $user_id = User::where('name','=','student1')->pluck('id')->first();

	    DB::table('lessons')->insert([
	    	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	//'user_id' => $user_id,
	    	'user_id' => 1,
	    	'semester' => 'Spring 2017',
	    	'lesson_number' => 10,
	    	'day' => 'Tuesday',
	    	'date' => '2017-03-28',
	    	'start_time' => '16:15:00',
	    	'end_time' => '17:00:00',
	    	'duration' => 45,
	    	'notes' => 'Scelerisque nunc nisi donec etiam purus et ligula aenean netus',
	    ]);

	    $user_id = User::where('name','=','student2')->pluck('id')->first();

	    DB::table('lessons')->insert([
	    	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	//'user_id' => $user_id,
	    	'user_id' => 1,
	    	'semester' => 'Spring 2017',
	    	'lesson_number' => 9,
	    	'day' => 'Tuesday',
	    	'date' => '2017-03-21',
	    	'start_time' => '16:15:00',
	    	'end_time' => '17:00:00',
	    	'duration' => 45,
	    	'notes' => 'Scales - review: G major in 2 Octaves, G major with Hunter\'s bowing',
	    ]);

	    $user_id = User::where('name','=','student1')->pluck('id')->first();

	    DB::table('lessons')->insert([
	    	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	//'user_id' => $user_id,
	    	'user_id' => 1,
	    	'semester' => 'Spring 2017',
	    	'lesson_number' => 8,
	    	'day' => 'Tuesday',
	    	'date' => '2017-03-28',
	    	'start_time' => '16:15:00',
	    	'end_time' => '17:00:00',
	    	'duration' => 45,
	    	'notes' => 'pieces: Minuet #1, Hunter\'s Chorus',
	    ]);

	    /*
	    DB::table('lessons')->insert([
	    	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	'user_id' => 4,
	    	'semester' => 'Spring 2017',
	    	'lesson_number' => 10,
	    	'day' => 'Tuesday',
	    	'date' => '2017-03-28'
	    	'start_time' => '16:15:00',
	    	'end_time' => '17:00:00'
	    	'duration' => 45,
	    ]);

	    DB::table('lessons')->insert([
	    	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    	'user_id' => 4,
	    	'semester' => 'Spring 2017',
	    	'lesson_number' => 10,
	    	'day' => 'Tuesday',
	    	'date' => '2017-03-28'
	    	'start_time' => '16:15:00',
	    	'end_time' => '17:00:00'
	    	'duration' => 45,
	    ]); */

	    
    }
}
