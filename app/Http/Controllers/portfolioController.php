<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function portfolio(string $id){
        return redirect()->away("http://127.0.0.1:5500/index.html?client_id=" . $id);
    }
}
