<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    
    public PostForm $form;

    public function render()
    {
        return view('livewire.posts.create-post');
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('posts.index');
    }
}
