<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index', ['tags' => Tag::all()]);
    }
}
