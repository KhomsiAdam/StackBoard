<?php

namespace App\Http\Controllers\Pages;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Thread;

class TagController extends Controller
{
    public function index(Tag $tag) {
        return view('pages.tags.index', [
            'threads' => Thread::ForTags($tag->slug())->paginate(10)
        ]);
    }
}
