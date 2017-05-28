{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.app')

@section('title')
    Create a New Lesson Entry
@endsection

@section('content')
    <h1>Create a New Lesson Entry</h1>

    <form method='POST' action='/lesson/new'>
        {{ csrf_field() }}

        {{-- get from User table, if user doesn't exist redirect to new student page --}}
        {{-- 
        <label for='user_id'>ID</label>
        <input type='integer' name='user_id' id='user_id'>
        --}}
       
        {{-- student - get dropdown from user table --}}
        
        <p>Select a Student</p>
        {{-- Form::Label('item', 'Item:') --}}
        <select class="form-control" name="student_id">
            @foreach($students as $student)
              <option value="{{$student->id}}">{{$student->name}}</option>
            @endforeach
        </select>
        <br />

        {{-- semester - drop-down --}}
        <label for='Semester'>Semester</label>
        <input type='text' name='semester' id='semester'>
        <br />

        {{-- lesson number --}}
        <label for='lesson-number'>Lesson Number</label>
        <input type='text' name='lesson-number' id='lesson-number'>
        <br />
        
        {{-- date --}}
        <label for='date'>Date</label>
        <input type='text' name='date' id='date'>
        <br />
        {{-- day --}}

        {{-- start_time --}}

        {{-- end_time --}}

        {{-- duration --}}

        {{-- notes --}}
        {{-- 
        <label for='notes'>Notes</label>
        <input type='text' name='notes' id='notes'>
        --}}
        {{ Form::text('Notes') }}
        <br />

        

        {{-- Test of Form class --}}
        

       
        {{-- Form::select('video', @foreach($videos as $video) [ $video ] @endforeach, null, ['multiple' => true] ) --}}
        {{-- Uses $video array generated by the bucket list function to get a list of available videos 
        from Amazon AWS --}}
        {!! Form::select('video', $videos, array('videos' => 'form-control'),  ['multiple' => true]) !!}
        <br />
        {{-- submit --}}
         <input type='submit' value='Add Lesson'>


        {{-- 
        DB::table('lessons')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            //'user_id' => $user_id,
            'user_id' => 1,
            'semester' => 'Spring 2017',
            'lesson_number' => 10,
            'day' => 'Tuesday',
            'date' => '2017-03-28 16:15:00',
            'start_time' => '16:15:00',
            'end_time' => '17:00:00',
            'duration' => 45,
            'notes' => '<ul><b>Witches\' Dance</b> <li>G Major - two octaves</li><li>G major - two octaves with WD bowing</li></ul>',
        ]);

        --}}
    </form>
@endsection