<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {

        $color = ['Оранжевый / Черный / Красный', 'Белый / Синий', 'Белый', 'Черный'];
        $size = ['S/M/L', 'S/M', 'M/X/XL', 'XL', 'S', 'M'];
        $category = ['Мужская', 'Женская', 'Детская'];
        $type = ['Свитер', 'Штаны', 'Футболка', 'Курточка', 'Костюм'];
        $splash_screen_image = ['splash_screen_image_1.jpg', 'splash_screen_image_2.jpg', 'splash_screen_image_3.jpg', 'splash_screen_image_4.jpg', 'splash_screen_image_5.jpg'];
        $name = fake()->name;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'price' => fake()->randomFloat(2, 0, 10000),
            'brand' => fake()->text(20),
            'description' => fake()->text(250),
            'color' => fake()->randomElement($color),
            'size' => fake()->randomElement($size),
            'category' => fake()->randomElement($category),
            'type' => fake()->randomElement($type),
            'splash_screen_image' => fake()->randomElement($splash_screen_image),
            'active' => fake()->boolean,
        ];
    }
}
