<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usersCountMax = DB::table('users')->max('id');
        $usersCountMin = DB::table('users')
            ->orderBy('id')
            ->skip(1)
            ->value('id');
        $usersCount = range($usersCountMin, $usersCountMax);

        $title = fake()->sentence(2);
        $slug = (string) str($title)->slug();
        return [
            'slug' => $slug,
            'title' => $title,
            'description' => fake()->sentence(),
            'users_id' => fake()->randomElement($usersCount),
        ];
    }
}
