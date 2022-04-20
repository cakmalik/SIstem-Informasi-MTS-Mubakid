<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'grade_id' => $this->faker->randomElement(Grade::all())['id'],
            'name' => $this->faker->name,
        ];
    }
}
