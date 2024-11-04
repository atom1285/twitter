<?php

namespace App\Http\Controllers;

use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        /*Post::create([
            'content' => "test",
            'likes' => 21,
        ]);*/

        $posts = Post::query()->orderBy('created_at', 'DESC');

        if (request()->filled('search')) {
            $posts = $posts->where('content', 'like', '%'.request()->get('search', '').'%');
        }

        return view(
            'dashboard',
            [
                'posts' => $posts->get(),
            ],
        );
    }
}
