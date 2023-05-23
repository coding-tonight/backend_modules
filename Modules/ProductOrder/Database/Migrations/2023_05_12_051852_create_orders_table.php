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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('email');
            $table->string('city');
            $table->string('contact_number');
            $table->string('full_name');
            $table->string('mode_of_payment'); 
            $table->string('total_amount');
            $table->json('order_products');
            $table->string('province'); 
            $table->string('delivery_fee')->nullable(); 
            $table->longText('postal_code');
            $table->enum('order_status' , ['pending' , 'done'])->default('pending');
            $table->string('address');
            $table->date('order_date');
            $table->time('order_time');
            $table->string('payment_verification')->nullable(); //pdf or image upload 
            // foreign key 
            // $table->unsignedBigInteger('user_id'); 
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};
