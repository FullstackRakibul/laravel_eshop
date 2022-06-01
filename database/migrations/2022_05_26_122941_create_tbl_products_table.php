<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('category_id');
            $table->integer('brand_id')->nullable();
            $table->string('product_name');
            $table->text('product_short_description');
            $table->longText('product_long_description')->nullable();
            $table->float('product_price');
            $table->string('product_image');
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->tinyInteger('publication_status')->default(0)->nullable();
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
        Schema::dropIfExists('tbl_products');
    }
};
