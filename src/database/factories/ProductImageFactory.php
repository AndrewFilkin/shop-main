<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition(): array
    {

        $image = ['product_image_1.jpg', 'product_image_2.jpg', 'product_image_3.jpg', 'product_image_4.jpg'];

        return [
            'product_id' => fake()->numberBetween(1, 89),
            'image' => fake()->randomElement($image),
        ];
    }
}
