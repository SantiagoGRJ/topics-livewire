<?php

namespace Tests\Feature\Livewire\Posts;

use App\Livewire\Posts\IndexPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class IndexPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_successfully()
    {
        Livewire::test(IndexPost::class)
            ->assertStatus(200);
    }
}
