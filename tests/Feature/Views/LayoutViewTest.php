<?php

namespace Tests\Feature\Views;

use App\Models\User;
use Tests\TestCase;

class LayoutViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLayoutViewRenderWhenUserIsAdmin()
    {
        $user = User::factory()->state(['type' => 'admin'])->create();
        $this->actingAs($user);
        $view = $this->view('layouts.layout');
        $view->assertSee('<a href="/admin/panel">Admin panel</a>', false);
    }

    public function testLayoutViewRenderWhenIsNotAdmin()
    {
        $user = User::factory()->state(['type' => 'user'])->create();
        $this->actingAs($user);
        $view = $this->view('layouts.layout');
        $view->assertDontSee('<a href="/admin/panel">Admin panel</a>', false);
    }
}
