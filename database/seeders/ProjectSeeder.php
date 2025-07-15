<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_admin' => true,
            'password' => 'password',
        ]);

        // Normal User
        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        // Admin Projects
        Project::factory()->count(2)->create([
            'user_id' => $admin->id,
        ]);

        // Normal User Projects
        Project::factory()->count(3)->create([
            'user_id' => $user->id,
        ]);
    }
}
