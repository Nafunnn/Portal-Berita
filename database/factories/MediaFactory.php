<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    protected $model = Media::class;

    public function definition(): array
    {
        $filename = fake()->uuid().'.jpg';

        return [
            'user_id' => User::factory(),
            'filename' => $filename,
            'path' => 'media/'.$filename,
            'mime_type' => 'image/jpeg',
            'size' => fake()->numberBetween(50000, 500000),
            'alt' => fake()->sentence(3),
        ];
    }
}
