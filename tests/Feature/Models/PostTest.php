<?php

namespace Tests\Feature\Models;

use App\Models\{
    User,
    Tag,
    Post,
    Comment,
    Category
};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new Post();
    }

    public function testPostRelationWithUser()
    {
        $post = Post::factory()
            ->for(Category::factory())
            ->for(User::factory(), 'author')
            ->create();
        $this->assertTrue(isset($post->author->id));
        $this->assertTrue($post->author instanceof User);
    }

    public function testPostRelationWithTags()
    {
        $count = rand(1, 10);
        $post = Post::factory()
            ->hasTags($count)
            ->create();
        $this->assertCount($count, $post->tags);
        $this->assertTrue($post->tags->first() instanceof Tag);
    }

    public function testPostRelationWithComments()
    {
        $count = rand(1, 10);
        $post = Post::factory()
            ->hasComments($count)
            ->create();
        $this->assertCount($count, $post->comments);
        $this->assertTrue($post->comments->first() instanceof Comment);
    }
}
