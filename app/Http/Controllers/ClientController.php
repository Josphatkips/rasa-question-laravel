<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function blank(){
        return view('client.blank');
    }

    public function categories(){
        // dd('yes');
        return view('client.categories');

    }
    public function questions(){
        // dd('yes');
        return view('client.questions');

    }
    public function dashboard(){
        // dd('yes');
        return view('client.dashboard');

    }
    public function failedQuestion(){

        return view('client.failedquestion');
        
    }
}
