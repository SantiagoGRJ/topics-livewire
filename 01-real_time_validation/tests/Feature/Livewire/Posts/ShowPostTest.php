<?php

namespace Tests\Feature\Livewire\Posts;

use App\Livewire\Posts\ShowPost;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ShowPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_successfully()
    {
        $post = Post::factory()->create();

        Livewire::test(ShowPost::class,['post' => $post])
        ->assertStatus(200);
    }



}
