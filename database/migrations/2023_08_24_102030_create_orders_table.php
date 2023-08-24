<?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('name');
            $table->integer('city');
            $table->integer('zipcode');
            $table->enum('payment_type',['esewa','cod'])->default('cod');
            $table->enum('payment_status',['y','n'])->default('n');
            $table->string('cartcode');
            $table->integer('totalamount');
            $table->integer('shippingamount');
            $table->integer('grandtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};