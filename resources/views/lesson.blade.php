@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lesson</div>

                <div class="panel-body">
                    You are logged in!

                    <div class="title m-b-md">
                        Cello Resources
                    </div>
                    <h2>{{ $lessonData["student_name"] }}, Lesson # {{ $lessonData["lessonNumber"] }}, {{ $lessonData["semester"] }}</h2>
                    <h3>{{ $lessonData["day"] }}, {{ $lessonData["date"] }}, {{ $lessonData["start_time"] }} </h3>
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
                            <h4>Lesson Notes:</h4>
                            <p>{{ $lessonData["notes"] }}</p>
                            
                            
                             @foreach($lessonData["video_array"] as $video) 
                                 <a href="video/{{ $video }}">{{ $video }}</a><br />
                                <!-- https://www.w3schools.com/html/html5_video.asp -->
                                <video width="320" height="180" controls>
                                    <source src="video/{{ $video }}" type="video/mp4">
                                    <!-- <source src="movie.ogg" type="video/ogg"> -->
                                    Your browser does not support the video tag.
                                </video><br />
                              @endforeach  
                    </div>

                    {{-- 

                        https://laravel.io/forum/04-28-2014-trying-to-get-property-of-non-object-no-idea-where-this-is-coming-from-help
                        This sounds like your object does not exist OR that it is an array...

                        This adding an "@" infront of the: $yourVar->value; to: @$yourVar->value;

                        OR

                        try this:

                        Change this: {{ $yourVar->value }} To: {{ $yourVar['value'] }}

                        Hard to tell without seeing any code...

                    --}}




                    {{-- 
                    <div class="links">
                        {{ $id }} <br /><br />
                        @foreach($keyArray as $key) 
                            <a href="video/{{ $key }}">{{ $key }}</a><br />
                        @endforeach
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
