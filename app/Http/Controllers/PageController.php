<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function users(User $users)
    {   
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function threads()
    {   
        return view('admin.threads.owned', [
            'threads' => Thread::where('author_id', Auth::user()->id)->orderby('id', 'desc')->paginate(10)
        ]);
    }

    public function replies()
    {   
        return view('admin.replies.owned', [
            'replies' => Reply::where('author_id', Auth::user()->id)->orderby('id', 'desc')->paginate(10)
        ]);
    }

    public function categoriesIndex()
    {
        return view('admin.categories.index');
    }

    public function categoriesCreate()
    {
        return view('admin.categories.create');
    }

    public function threadsIndex()
    {
        return view('admin.threads.index');
    }
}
