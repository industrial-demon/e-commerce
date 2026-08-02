<?php

use App\Models\Brand;
use App\Models\Category;
use App\Enums\ProductStockStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Brand::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('regular_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock_quantity')->nullable(false)->default(0);
            $table->enum('out_of_stock', array_column(ProductStockStatus::cases(), 'value'))->default(ProductStockStatus::IN_STOCK->value);
            $table->string('featured')->default('no');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
