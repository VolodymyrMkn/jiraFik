<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Projects;
use App\Models\Tasks;
use App\Models\User;
use Database\Factories\ProjectsFactory;
use Database\Factories\TasksFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::insert([
//            'name' => 'Admin',
//            'email' => 'admin@admin',
//            'password' => Hash::make('1234512345'),
//            'roles_id' => 1,
//        ]);

//            User::factory(10)->create();
//            Projects::factory(7)->create();
//            Tasks::factory(27)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
