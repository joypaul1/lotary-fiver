<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price');
            $table->decimal('discount')->nullable();
            $table->enum('discount_type', ['percent', 'amount'])->nullable();
            $table->double('opening_balance');
            $table->double('current_stock');
            $table->string('feature_image')->nullable();
            $table->timestamps();

            $table->unique(['origin_id', 'brand_id', 'category_id', 'name']);

            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
