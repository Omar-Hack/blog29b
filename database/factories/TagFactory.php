<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Jenssegers\Date\Date;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence(1);
        return [
            'status'   => $this->faker->randomElement(['1', '2']),
            'title'    => $name,
            'slug'     => Str::slug($name),
            'icon'     => $this->faker->text(10),
            'description' => $this->faker->text(100),
        ];
    }
}
