<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@technews.test'],
            [
                'name' => 'Admin TechNews',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::query()->updateOrCreate(
            ['email' => 'editor@technews.test'],
            [
                'name' => 'Editor TechNews',
                'password' => Hash::make('password'),
                'role' => 'editor',
            ]
        );

        $this->call([
            CategorySeeder::class,
            NewsSeeder::class,
        ]);
    }
}
