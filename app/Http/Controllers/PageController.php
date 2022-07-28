<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class PageController extends Controller
{
    function index() {
        $data = Movie::all();

        return view('movies.index',[
            "movies" => $data
        ]);
    }

    function show($id) {
        $foundMovie = null;
        $data = Movie::all();
        foreach ($data as $i => $movie) {
            if ($movie['id'] === intval($id)) {
                $foundMovie = $movie;
                break;
            }
        }
        if(is_null($foundMovie)){
            abort("404");
        }
        return view("movies.show", [
            "movie" => $foundMovie
        ]);
    }
}
