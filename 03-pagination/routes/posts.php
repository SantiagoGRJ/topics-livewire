<?php   

use App\Livewire\Posts\IndexPost;
use Illuminate\Support\Facades\Route;

Route::get('/',IndexPost::class)->name('index');