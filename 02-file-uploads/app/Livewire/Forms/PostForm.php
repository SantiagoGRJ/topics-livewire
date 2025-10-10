<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Form;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostForm extends Form
{
    
    public ?Post $post=null;
    public $title;

    public $content;

    public $image;

    public $date;

    public function setPost(Post $post)
    {
        $this->post=$post;
        $this->title=$post->title;
        $this->content=$post->content;
        $this->image=$post->image;
    }

    public function rules() : array
    {
        return [
            'title' => ['required','min:3',Rule::unique('posts')->ignore($this->post?->id)],
            'content' => ['required'],
            'image' => ['required','image',Rule::unique('posts','image')->ignore($this->post?->id),'max:1024']  
        ];
    }

    public function store()
    {
        $this->validate();
        $modifyName=$this->generateFileName($this->image->getClientOriginalName());
        $this->image->storeAs(path:'photos',name:$modifyName);
        Post::create([
            'title'       => $this->title,       
            'content' => $this->content,
            'image'       => $modifyName,     
        ]);

    }

    public function update() : Post
    {
        $this->validate();
<<<<<<< HEAD
        Storage::delete('photos/'.$this->post->image);
        $modifyName=$this->generateFileName($this->image->getClientOriginalName());
        $this->image->storeAs(path:'photos',name:$modifyName);
        $updatePost = $this->post->update([
=======

        if($this->image && !is_string($this->image)){
            if(filled($this->post->image) && Storage::exists('photos/'.$this->post->image)){
                Storage::delete('photos/'.$this->post->image);
            }

            
            $modifyName=$this->generateFileName($this->image->getClientOriginalName());
            $this->image->storeAs(path:'photos',name:$modifyName);
            $this->post->update([
                'title' => $this->title,
                'content' => $this->content,
                'image' => $modifyName
            ]);
        }
        $this->post->update([
>>>>>>> e90c86c528164e424b56ff2efa0da417b6c91600
            'title' => $this->title,
            'content' => $this->content
        ]);

<<<<<<< HEAD
         return $this->post;
=======

        return $this->post;
>>>>>>> e90c86c528164e424b56ff2efa0da417b6c91600

    }


    
    public function generateFileName($clientOriginalName) : string
    {
        $day=Carbon::now();
        $date=$day->format('d-m-Y_H-i-s');

        $cleanName=trim($clientOriginalName);

        return "{$date}_{$cleanName}";
    }
}
