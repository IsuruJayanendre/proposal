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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming payments are associated with users
            $table->decimal('price', 8, 2); // Storing price as decimal (8 digits, 2 decimal places)
            $table->string('payment_method'); // Method of payment (e.g., card, PayPal, etc.)
            $table->string('status')->default('pending'); // Status of payment
            $table->timestamps();
    
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
