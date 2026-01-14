<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        return view('results', ['jobs' => $tag->jobs]);
    }

    public function index()
    {
        return view('tags.index', ['tags' => Tag::all()]);
    }
}
