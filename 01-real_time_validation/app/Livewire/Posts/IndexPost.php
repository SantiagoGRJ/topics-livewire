<?php

namespace App\Livewire\Posts;

use App\Models\Post;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class IndexPost extends Component
{
    use WithPagination;

    
    public $search = '';

    public function delete(Post $post)
    {
        $post->delete();
        
        session()->flash('status','Post deleted!');
    }

    public function render()
    {
        return view('livewire.posts.index-post')->with([
            'posts' => Post::search($this->search),
        ]);
    }
}
