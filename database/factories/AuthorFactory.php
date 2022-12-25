<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Author::class;

    public function definition()
    {
        $name = $this->faker->name . ' ' . $this->faker->firstName;
        return [
            'name' => $name,
            'date_at' => $this->faker->date,
            'slug' => Str::slug($name, '-'),
        ];
    }
}
