<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke()
    {
        return view('tags.index', ['tags' => Tag::all()]);
    }
}
