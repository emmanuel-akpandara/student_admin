<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class playgroundController extends Controller
{
    public function playground()
    {
        return view('playground');
    }
}
