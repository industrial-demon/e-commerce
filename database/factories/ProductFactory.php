<?php

namespace Database\Factories;

use App\Enums\ProductStockStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        $name = $this->faker->name();
        $slug = Str::slug($name) . '-' . uniqid();
        return [

            'brand_id' => Brand::inRandomOrder()->value('id'),
            'category_id' => Category::inRandomOrder()->value('id'),
            'user_id' => User::inRandomOrder()->value('id'),
            'name' => $this->faker->name(),
            'slug' => $slug,
            'regular_price' => $this->faker->numberBetween(10, 999999),
            'sale_price' => $this->faker->numberBetween(10, 999999),
            'sku' => strtoupper(Str::random(10)),
            'stock_quantity' => $this->faker->randomNumber(),
            'stock_status' => $this->faker->randomElement(array_column(ProductStockStatus::cases(), 'value')),
            'featured' => $this->faker->randomElement(['yes', 'no']),
            'short_description' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(4),
            'status' => $this->faker->randomElement(['draft', 'published']),
        ];
    }
}
