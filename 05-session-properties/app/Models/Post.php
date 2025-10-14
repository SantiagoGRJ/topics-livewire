<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

     public static function search($query)
    {
        return Post::whereAny([
            'title',
            'content'
        ],
        'LIKE',
        "%".$query."%"
    )->paginate(10);
    }
}
