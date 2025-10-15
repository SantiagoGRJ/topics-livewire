<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class IndexPost extends Component
{
    public $query = '';

    public function delete(Post $post)
    {
        
        if(filled($post->image) && Storage::disk('public')->exists('photos/'.$post->image)){
          
            Storage::disk('public')->delete('photos/'.$post->image);
        }
         
        $post->delete();

        $this->redirect(IndexPost::class);
    }

    public function download(Post $post)
    {
        return Storage::disk('public')->download('photos/'.$post->image,$post->image);
    }

    public function render()
    {

        return view('livewire.posts.index-post')->with([
            'posts' => Post::all(),
        ]);
    }
}
