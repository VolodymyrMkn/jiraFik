<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $taskCountMax = DB::table('projects')->min('id');
        $taskCountMin = DB::table('projects')->max('id');
        return [
            'title' => fake()->sentence(),
            'status_id' => 1,
            'projects_id' => fake()->numberBetween($taskCountMin, $taskCountMax),
        ];
    }
}
