<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class PageController extends Controller
{
    function index() {
        $data = Movie::all();

        dump($data);

        return view('movies.index',[
            "movies" => $data
        ]);
    }
}
