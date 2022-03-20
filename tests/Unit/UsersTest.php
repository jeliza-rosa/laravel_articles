<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{

    use RefreshDatabase;

    public function testAUserCanHaveTasks()
    {
        $user = User::factory()->create();

        $attributes = Article::factory()->raw(['owner_id' => $user]);

        $user->tasks()->create($attributes);

        $this->assertEquals($attributes['title'], $user->tasks->first()->title);
    }
}
