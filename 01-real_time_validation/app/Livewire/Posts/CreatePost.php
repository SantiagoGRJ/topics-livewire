<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;


class CreatePost extends Component
{
    public PostForm $form;
    
    public function save()
    {
        $this->form->store();
        
        return redirect()->route('posts.index')
            ->with('status','Post created!');
    }

  
    
    public function render()
    {
        return view('livewire.posts.create-post');
    }
}
