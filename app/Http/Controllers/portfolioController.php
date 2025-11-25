<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function portfolio(){
        return redirect()->away("http://127.0.0.1:5500/index.html");
    }
}
