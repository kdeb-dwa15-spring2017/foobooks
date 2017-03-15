<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Library\BucketList;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
        $bl= new BucketList();
        $keyArray = $bl->makeList();
        //echo gettype($bl);
        //echo gettype($keyArray);
        //dump($bl);
        //dump($keyArray);
        return view('home')->with('keyArray', $keyArray);
    }
}
