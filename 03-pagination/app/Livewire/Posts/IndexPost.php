<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class IndexPost extends Component
{
    use WithPagination;
    
    public $query='';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.posts.index-post')->with([
            'posts' => Post::search($this->query),
        ]);
    }
}
