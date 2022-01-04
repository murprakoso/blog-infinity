<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $blogPerPage = 9;

    /** index home */
    public function index()
    {
        return view('home.index', [
            'posts' => Post::publish()->latest()->paginate($this->blogPerPage)
        ]);
    }
}
