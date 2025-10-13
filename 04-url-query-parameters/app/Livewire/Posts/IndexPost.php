<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;


#[Title('Posts')]
class IndexPost extends Component
{
    #[Url(as:'q',keep:true,history:true)]
    public $query='';

    
    public function render()
    {
        return view('livewire.posts.index-post',[
            'posts' => Post::search($this->query),
        ]);
    }
}
