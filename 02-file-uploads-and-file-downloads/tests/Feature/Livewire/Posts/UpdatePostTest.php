<?php

namespace Tests\Feature\Livewire\Posts;

use App\Livewire\Posts\UpdatePost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UpdatePostTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(UpdatePost::class)
            ->assertStatus(200);
    }
}
