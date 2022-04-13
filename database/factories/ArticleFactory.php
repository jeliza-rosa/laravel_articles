<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usersId = User::all()->pluck('id')->toArray();

        return [
            'code' => Str::random(),
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence,
            'detail' => $this->faker->sentence(10),
            'published' => $this->faker->numberBetween(0,1),
            'owner_id' => \App\Models\User::find($usersId[rand(0, count($usersId) - 1)])
        ];
    }
}
