<?php

namespace App\Http\Controllers;
use App;
use Config;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
       // echo $locale = App::getLocale();
        $data = [
            'title' => 'Demo Angular Laravel'
        ];
        
        return view('home',$data );
    }
}
