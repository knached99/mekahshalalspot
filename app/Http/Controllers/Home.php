<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function homePage(){
        return view('landing.home');
    }

    public function cateringPage(){

        return view('landing.catering');
    }
}
