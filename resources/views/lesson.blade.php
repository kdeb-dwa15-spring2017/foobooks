@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <!--  <div class="col-md-8 col-md-offset-2"> -->
        <div class="col-md-8">
             <a href="/home">back to lesson index</a>
            <div class="panel panel-default">

                <div class="panel-heading"><h2>{{ $lessonData["student_name"] }} - {{ $lessonData["semester"] }}</h2></div>

                <div class="panel-body">
                    

                    <div class="title m-b-md">
                        <h3>Lesson {{ $lessonData["lessonNumber"] }} - {{ date('l, M d, Y g:i a', strtotime($lessonData["date"])) }}  </h3>
                        <h3></h3>
                    </div>
                    
            

                    {{-- http://stackoverflow.com/questions/40038521/change-the-date-format-in-laravel-view-page/40038541 --}}
                    <div class="links">
                            {{-- 
                            {{ $lessonData["student_name"] }}<br />
                            {{ $lessonData["id"] }}<br />
                            {{ $lessonData["semester"] }}<br />
                            {{ $lessonData["lessonNumber"] }}<br />
                            {{ $lessonData["day"] }}<br />
                            {{ $lessonData["date"] }}<br />
                            {{ $lessonData["start_time"] }}<br/>
                            {{ $lessonData["end_time"] }}<br/>
                            {{ $lessonData["duration"] }}<br/>
                            {{ $lessonData["user_id"] }}<br/>
                            --}}

                            {{-- LESSON NOTES --}}
                              <h4>Lesson Notes:</h4>
                                <p>{!! $lessonData["notes"] !!}</p> 
                            {{-- VIDEOS --}}
                            {{-- video_name --}}
                            @if($lessonData["video_array"])
                                <h4>Lesson Videos:</h4>
                            @endif
                             @foreach($lessonData["video_array"] as $video) 
                                 <a href="/video/{{ $video }}">{{ $video }}</a><br />
                                <!-- https://www.w3schools.com/html/html5_video.asp -->
                                <video width="320" height="180" controls>
                                    <source src="/video/{{ $video }}" type="video/mp4">
                                    <!-- <source src="movie.ogg" type="video/ogg"> -->
                                    Your browser does not support the video tag.
                                </video><br />
                              @endforeach 
                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
