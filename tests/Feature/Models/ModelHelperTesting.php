<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

trait ModelHelperTesting
{

    public function testInsertData()
    {
        $model = $this->model();
        $table = $model->getTable();

        $data = $model::factory()->make()->toArray();

        if ($model instanceof User) {
            $data['password'] = 'thisIsTestPasswordLOL';
        }
        $model::create($data);
        $this->assertDatabaseHas($table, $data);
    }

    abstract protected function model(): Model;
}
