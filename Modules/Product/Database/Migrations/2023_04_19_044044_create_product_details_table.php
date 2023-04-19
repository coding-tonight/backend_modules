<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('color');
            // Dimension
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('length')->nullable();
            // end Dimension
            // images for product detail
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three');
            // end images
            $table->text('description');
            $table->text('extra_field')->nullable();
            $table->text('extra_field_1')->nullable();
            $table->text('extra_field_2')->nullable();
            $table->string('farbic')->nullable();
            $table->string('zipper')->nullable();
            $table->string('running')->nullable();
            $table->string('thread')->nullable();
            $table->string('tape')->nullable();
            $table->string('tofada')->nullable();
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
        Schema::dropIfExists('product_details');
    }
};
