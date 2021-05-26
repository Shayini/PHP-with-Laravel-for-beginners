<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // create sessions
        // $request->session()->put(['thaksha'=>'master instructor']);
        // or
        // session(['peter'=>'student']);          // global function
        // $request->session()->put(['thaksha2'=>'your teacher']);

        // delete sessions
        // $request->session()->forget('thaksha2');

        // delete all sessions
        // $request->session()->flush();

        // return $request->session()->all();
        // echo $request->session()->get('thaksha');





        // flash data(the data will be available for only one request or for a short period of time)
        // when you comment the request and reload the page again - it will disappear
        // $request->session()->flash('message', 'Post has been created');
        // $request->session()->reflash();     // will keep the data little longer
        // $request->session()->keep('message');   // keep a specific type of data & delete everything else

        // return $request->session()->get('message');





        // return view('home');
    }
}
