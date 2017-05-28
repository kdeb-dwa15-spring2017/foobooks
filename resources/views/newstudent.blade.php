{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.app')

@section('title')
    Create a New Student Record
@endsection

@section('content')
    <h1>Register a New Student</h1>

    {{-- Form::model($user, ['route' => ['user.update', $user->id]]) --}}
    
    
    <form method='POST' action="{{ route('register') }}">
        {{-- action='/admin/student/new' --}}
        {{ csrf_field() }}

        {{-- 
        <label for='title'>Title</label>
        <input type='text' name='title' id='title'>
        <input type='submit' value='Add book'>
        --}}
        <label for='name'>Name</label>
        <input type='text' name='name' id='name'>

        <label for='name'>Email</label>
        <input type='text' name='email' id='email'>

        <label for='password'>Password</label>
        <input type='text' name='password' id='password'>

         <input type='submit' value='Add student'>

    
        {{-- 
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'student2',
            'email' => 'student1@blah.com',
            'password' => Hash::make('blah'),
            'remember_token' => null, 
        ]);
        --}}
    </form>
@endsection