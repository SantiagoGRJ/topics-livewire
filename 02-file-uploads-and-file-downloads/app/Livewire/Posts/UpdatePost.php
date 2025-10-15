<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePost extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public function mount(Post $post)
    {
        $this->form->setPost($post);
    }

    public function save()
    {
        
             $this->form->update();

        $this->redirect(IndexPost::class);
    }
    

    public function render()
    {
        return view('livewire.posts.update-post');
    }
}
