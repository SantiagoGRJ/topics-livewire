<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Session;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPost extends Component
{
    use WithPagination;

    #[Session(key:'search')] 
    public $search;

    
    public function posts()
    {
        return $this->search === ''
        ? DB::table('posts')->paginate(10)
        : Post::search($this->search);
    }

    public function render()
    {
        return view('livewire.posts.index-post',[
            'posts' => $this->posts(),
        ]);
    }

}
