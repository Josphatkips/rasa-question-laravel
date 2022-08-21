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
}
