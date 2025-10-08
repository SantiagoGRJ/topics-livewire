<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'title',
        'content'
    ];

    public static function search($search)
    {
       return Post::whereAny(
            [
                'title',
                'content'
            ],
            'LIKE',
            "%".$search."%"
        )->paginate(10,);
    }
}
