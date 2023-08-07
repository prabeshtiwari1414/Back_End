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
        Schema::create('shippingcharges', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->integer('shipping_charge');
            $table->enum('status',['Show','Hide'])->default('Hide');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippingcharges');
    }
};