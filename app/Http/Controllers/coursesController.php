<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\programme;
use Illuminate\Http\Request;

class coursesController extends Controller
{
    public function courses()
    {
//        $courses = courses::get(); or this
        $perPage = 6;
        $courses = courses::orderBy('name')->with('programme')->paginate($perPage);
        $courses->makeVisible('created_at');
        return view('courses', compact ('courses'));
    }
}
