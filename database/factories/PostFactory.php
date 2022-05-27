<?php

namespace Database\Factories;

use App\Models\{Post, Category};
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Jenssegers\Date\Date;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence(1);
        return [
            'status'      => $this->faker->randomElement(['1', '2']),
            'title'       => $name,
            'slug'        => Str::slug($name),
            'image'       => $this->faker->imageUrl(480, 480, null, false),
            'category'    => category::all()->random()->id,
            'description'    => $this->faker->text(100),
            'content'     => $this->faker->text(500),
        ];
    }
}
