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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->string('info',500);
            $table->string('usage_techniques',500)->default('descrizione di come utilizzare il prodotto');
            $table->string('installation_mode',500)->default('descrizione di come installare il prodotto');
            $table->string('image');
            $table->string('thumbnail');
            $table->string('malfunctions',2000)->default('descrizione dei malfunzionameti');
            $table->string('solutions',2000)->default('descrizione delle soluzioni');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
