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
        Schema::create('assistance_centers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->nullable()->constrained();
            $table->string('region');
            $table->string('name');
            $table->string('street')->nullable();
            $table->decimal('lat',10,8)->nullable();
            $table->decimal('long',10,8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistance_centers');
    }
};
