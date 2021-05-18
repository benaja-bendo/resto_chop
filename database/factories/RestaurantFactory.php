<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'name'=> $name,
            'slug'=> Str::slug($name, '-'),
            'profile_photo_path'=> $this->faker->imageUrl(),
            'sigle'=> $this->faker->title,
            'email_public'=> $this->faker->email,
            'number_public'=> $this->faker->phoneNumber,
        ];
    }
}
