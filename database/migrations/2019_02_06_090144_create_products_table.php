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
            $table->increments('id');
            $table->unsignedInteger('manufacturer_id');
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->unsignedInteger('quantity');
            $table->decimal('price', 15, 4);
            $table->decimal('weight', 15, 8);
            $table->decimal('length', 15, 8);
            $table->decimal('width', 15, 8);
            $table->decimal('height', 15, 8);
            $table->string('image')->nullable();
            $table->tinyInteger('status');
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
