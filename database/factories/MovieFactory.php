<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cover = public_path('storage/cover');

        $covers = collect(File::files($cover))->map(fn($file) => 'cover/' . $file->getFilename());
        $links = collect([
            "https://www.youtube.com/watch?v=P273sRlm4tM",
            "https://www.youtube.com/watch?v=w4HNJqkooZo",
            "https://www.youtube.com/watch?v=P0PVHFTWajM",
            "https://www.youtube.com/watch?v=MVQ2LT7gpMo"
        ]);

        return [
            'title' => fake()->sentence(3),
            'synopsis' => fake()->paragraph(),
            'year' => fake()->numberBetween(2000, 2025),
            'link' => $links->random(),
            'cover' => $covers->isNotEmpty() ? $covers->random() : null,
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
        ];
    }
}
