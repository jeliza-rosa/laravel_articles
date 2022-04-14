<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public function testAUserCanHaveTasks()
    {
        $user = User::factory()->create();

        $attributes = Article::factory()->raw(['owner_id' => $user]);

        $user->articles()->create($attributes);

        $this->assertEquals($attributes['name'], $user->articles->first()->name);
    }
}
