<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::
        paginate(10, ['*'], 'page', 2);


        dd($post->toArray());
    }
}
