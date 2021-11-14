<?php

namespace Tests\Feature\Models;

use App\Models\{
    User,
    Post,
    Comment,
};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new User();
    }

    public function testUserRelationWhithPosts()
    {
        $count = rand(1, 10);
        $user = User::factory()
            ->hasPosts($count)
            ->create();
        $this->assertCount($count, $user->posts);
        $this->assertTrue($user->posts->first() instanceof Post);
    }
    public function testUserRelationWhithComments()
    {
        $count = rand(1, 10);
        $user = User::factory()
            ->hasComments($count)
            ->create();
        $this->assertCount($count, $user->comments);
        $this->assertTrue($user->comments->first() instanceof Comment);
    }
}
