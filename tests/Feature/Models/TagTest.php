<?php

namespace Tests\Feature\Models;

use App\Models\{
    Tag,
    Post
};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new Tag();
    }

    public function test_tag_create()
    {
        $post = Tag::factory()->make()->toArray();
        Tag::create($post);
        $this->assertDatabaseHas('tags', $post);
    }

    public function testTagRelationWithPost()
    {
        $count = rand(1, 10);
        $tag = Tag::factory()
            ->hasPosts($count)
            ->create();
        $this->assertCount($count, $tag->posts);
        $this->assertTrue($tag->posts->first() instanceof Post);
    }
}
