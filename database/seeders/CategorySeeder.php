<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'AI',
            'Smartphone',
            'Laptop',
            'PC Hardware',
            'Gaming',
            'Software',
            'Cyber Security',
        ];

        foreach ($categories as $name) {
            Category::query()->firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
