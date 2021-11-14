<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Models\ModelHelperTesting;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase, ModelHelperTesting;

    protected function model(): Model
    {
        return new Category();
    }
}
