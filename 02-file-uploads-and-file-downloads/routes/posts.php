<?php

use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\IndexPost;
use App\Livewire\Posts\UpdatePost;
use Illuminate\Support\Facades\Route;

Route::get('/',IndexPost::class)->name('index');
Route::get('/create',CreatePost::class)->name('create');
Route::get('/edit/{post}',UpdatePost::class)->name('edit');

?>