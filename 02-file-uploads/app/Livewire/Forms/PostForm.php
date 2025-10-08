<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Form;
use Carbon\Carbon;
class PostForm extends Form
{
    
    public ?Post $post=null;
    public $title;

    public $content;

    public $image;

    public $originalFileName;

    public $modifyName;

    public $date;

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
        $this->originalFileName=$this->image->getClientOriginalName();
        $this->modifyName=$this->generateFileName($this->originalFileName);
        $this->image->storeAs(path:'photos',name:$this->modifyName);
        Post::create([
            'title'       => $this->title,       
            'content' => $this->content,
            'image'       => $this->modifyName,     
        ]);

    }


    
    public function generateFileName($clientOriginalName) : string
    {
        $day=Carbon::now();
        $date=$day->format('d-m-Y_H-i-s');

        $cleanName=trim($clientOriginalName);

        return "{$date}_{$cleanName}";
    }
}
