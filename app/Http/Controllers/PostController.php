<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class PostController extends Controller
{
    public function index()
    {
//        $posts = Post::allPosts();
        $cachePosts = Post::query()->get();

        Redis::client()->set('posts_', $cachePosts);
        $posts = Redis::client()->get('posts_');
//        $posts = json_decode($posts);
//        dd($posts);

        return view('frontend.blog.index', compact('posts'));
    }
}
