<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowPost extends Component
{
    #[Layout('Show Post')]
    public Post $post;
    

    public function render()
    {
        return view('livewire.posts.show-post');
    }
}
