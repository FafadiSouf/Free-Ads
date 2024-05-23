<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    // Methode qui appelle la vue 
    public function showIndex(){
        return view("index"); 
    }
}
