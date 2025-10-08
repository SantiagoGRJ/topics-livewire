<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Attributes\Locked;
use Livewire\Component;

class UpdatePost extends Component
{
    public PostForm $form;

    public function mount(Post $post)
    {
        $this->form->setPost($post);
    }

    
    
public function updatedFormTitle()
{
    
    $this->form->post->update(['title' => $this->form->title]);
    session()->flash('autosaved', 'Updated automatically!!');
}

public function updatedFormContent()
{
    $this->form->post->update(['content' => $this->form->content]);
    session()->flash('autosaved', 'Updated automatically!!');
}

    public function save()
    {
        $this->form->update();

        session()->flash('message','Post Updated successfully!!');
        return redirect()->route('posts.create');
    }

    public function render()
    {
        return view('livewire.posts.update-post');
    }
}
