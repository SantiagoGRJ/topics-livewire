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
        'content',
        'image'
    ];

    public static function search($query)
    {
       return Post::whereAny(
        [
            'id',
            'title',
            'content',
            'image'
        ],
        'LIKE',
        "%".$query."%");
    } 
}
