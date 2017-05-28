@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{ $user->name }}'s Lessons</h2></div>

                <div class="panel-body">
                    

                    <div class="title m-b-md">
                        
                    </div>
                    
                    <div class="links">
                        
                        @foreach($lessons as $lesson) 

                            {{-- <a href="lesson/{{ $lesson->id }}">{{ $lesson->id }}</a><br /> --}}
                            <a href="lesson/{{ $lesson->id }}"><h4>Lesson {{ $lesson->lesson_number }}, {{ $lesson->semester }} - {{ date('l, M d, Y g:i a', strtotime($lesson->date)) }}</h4></a>
                            {{-- $lesson --}}
                        @endforeach
                    </div>
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
