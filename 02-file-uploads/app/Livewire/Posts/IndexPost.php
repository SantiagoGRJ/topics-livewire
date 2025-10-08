<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class IndexPost extends Component
{
    public $query = '';

    public function render()
    {
        return view('livewire.posts.index-post')->with([
            'posts' => Post::all(),
        ]);
    }
}
