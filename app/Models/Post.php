<?php

namespace App\Models;

use App\Http\QueryFilters\MaxCount;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Pipeline;
use App\Http\QueryFilters\Sort;
use App\Http\QueryFilters\Status;

class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    public static function allPosts()
    {
        return Pipeline::send(Post::query())
            ->through([
                Sort::class,
                Status::class,
                MaxCount::class,
            ])
            ->thenReturn()
            ->paginate(20);
    }
}
