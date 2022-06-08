<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->integer('category_id');
            $table->integer('bookAuthor_id');
            $table->string('product_name');
            $table->text('product_desc')->nullable();
            $table->integer('product_quantity');
            $table->string('product_price');
            $table->string('product_slug');
            $table->string('product_image')->nullable();
            $table->integer('product_status');
            $table->string('product_slug');
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
        Schema::dropIfExists('product');
    }
}
