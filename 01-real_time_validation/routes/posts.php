<?php

use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\IndexPost;
use App\Livewire\Posts\ShowPost;
use App\Livewire\Posts\UpdatePost;
use Illuminate\Support\Facades\Route;

Route::get('/',IndexPost::class)->name('index');
Route::get('/create',CreatePost::class)->name('create');
Route::get('/show/{post}',ShowPost::class)->name('show');
Route::get('/update/{post}',UpdatePost::class)->name('update');

?>