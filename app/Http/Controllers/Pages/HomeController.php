<?php

namespace App\Http\Controllers\Pages;

use App\Models\Thread;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.threads.index', [
            'threads' => Thread::orderby('id', 'desc')->paginate(10)
        ]);
    }
}
