<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
Use App\Models\User;

class ArticleTest extends TestCase
{
//    use WithFaker;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanCreateArticle()
    {
      $this->actingAs($user = User::factory()->create());

      $attributes = Article::factory()->raw(['owner_id' => $user]);

      $this->post('/articles', $attributes);

//      $this->post('/articles', $attributes = [
//          'code' => Str::random(),
//          'name' => $this->faker->words(3, true),
//          'description' => $this->faker->sentence,
//          'detail' => $this->faker->sentence,
//          'published' => rand(0, 1)
//      ]);

      $this->assertDatabaseHas('articles', $attributes);
    }

    public function testGuestMayNotCreateATask()
    {
        $this->post('/articles', [])->assertRedirect('/login');
    }
}
