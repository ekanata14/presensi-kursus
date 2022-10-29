<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Course;

class SearchController extends Controller
{
    public function index(Request $request){
        return view('dashboard.search.index',[
            'title' => 'Search',
            'students' => Students::latest()->filter(request(['search']))->paginate(7),
            'courses' => Course::latest()->filter(request(['search']))->paginate(7)
        ]);
    }
}
