<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConversationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            // 'user_id' => 1,  // 直接指定 id
            'title' => $this->faker->title(),
            'body' => $this->faker->paragraph(),
        ];
    }
}
