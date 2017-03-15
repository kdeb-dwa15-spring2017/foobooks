@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    <div class="title m-b-md">
                        Cello Resources
                    </div>
                    <h3>Some test videos - click on an mp4 file</h3>
                    <div class="links">
                        @foreach($keyArray as $key) 
                            <a href="video/{{ $key }}">{{ $key }}</a><br />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
