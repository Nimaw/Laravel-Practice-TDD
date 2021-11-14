<?php

namespace Tests\Feature\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexMethod()
    {
        Post::factory()->count(100)->create();
        $response = $this->get(route('home'));
        $response->assertViewIs('home');
        $response->assertViewHas('posts', Post::latest()->paginate(15));
        $response->assertStatus(200);
    }
}
