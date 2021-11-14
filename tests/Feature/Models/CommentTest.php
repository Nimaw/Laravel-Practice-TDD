<?php

namespace Tests\Feature\Models;

use App\Models\{
    Comment,
    User,
    Post
};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new Comment();
    }

    public function testCommentRelationWithPosts()
    {
        $comment = Comment::factory()
            ->hasCommentable(Post::factory())
            ->create();
        $this->assertTrue(isset($comment->commentable->id));
        $this->assertTrue($comment->commentable->first() instanceof Post);
    }

    public function testCommentRelationWithUsers()
    {
        $comment = Comment::factory()
            ->for(User::factory(), 'author')
            ->create();
        $this->assertTrue(isset($comment->author->id));
        $this->assertTrue($comment->author->first() instanceof User);
    }
}
