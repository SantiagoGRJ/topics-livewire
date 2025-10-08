<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Form;

class PostForm extends Form
{
    
    public ?Post $post=null;
    public $title;

    public $content;

    public $image;

    public function rules() : array
    {
        return [
            'title' => ['required','min:3',Rule::unique('posts')->ignore($this->post?->id)],
            'content' => ['required'],
            'image' => ['image|max:1024']  
        ];
    }

    public function store()
    {
        $this->validate();

        Post::create($this->only('title','content','image'));
        $this->image->store(path:'photos');

    }
}
