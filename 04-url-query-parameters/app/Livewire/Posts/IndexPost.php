<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Posts')]
class IndexPost extends Component
{
    

    public $query='';

    public function render()
    {
        return view('livewire.posts.index-post',[
            'posts' => Post::search($this->query),
        ]);
    }
}
