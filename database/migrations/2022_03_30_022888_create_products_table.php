<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 255);
            $table->string('thumbnail_image');
            $table->foreignId('product_company_id')->constrained('product_companies');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('product_type_id')->constrained('product_types');
            $table->double('import_price')->default(0);
            $table->double('price')->default(0);
            $table->boolean('discount')->default(false);
            $table->double('discount_number')->default(0);
            $table->text('description')->nullable();
            $table->integer('total_quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
