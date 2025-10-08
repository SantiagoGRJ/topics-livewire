<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post=null;
    //
    #[Validate]
    public $title;
#[Validate]
    public $content;

     protected function rules()
    {
        return [
            'title' => [
                'required',
                Rule::unique('posts','title')->ignore($this->post), 
                'min:5'
            ],
            'content' => 'required|min:5',
        ];
    }

    public function setPost(Post $post)
    {
        $this->post=$post;
        $this->title=$post->title;
        $this->content=$post->content;
    }

    public function store()
    {
        $this->validate();

        Post::create($this->pull());

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->post->update(
            $this->all(),
        );
    }


}
