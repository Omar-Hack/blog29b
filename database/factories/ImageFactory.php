<?php

namespace Database\Factories;

use App\Models\{Post, Image};
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url'  => $this->faker->imageUrl(480, 480, null, false),
        ];
    }
}
