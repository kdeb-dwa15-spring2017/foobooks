<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'student2',
	        'email' => 'student1@blah.com',
	        'password' => Hash::make('blah'),
	        'remember_token' => null, 
    	]);

	     DB::table('users')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'student2',
	        'email' => 'student2@blah.com',
	        'password' => Hash::make('blah'),
	        'remember_token' => null, 
	    ]);

     	DB::table('users')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'student3',
	        'email' => 'student3@blah.com',
	        'password' => Hash::make('blah'),
	        'remember_token' => null, 
    	]);
    }
}

