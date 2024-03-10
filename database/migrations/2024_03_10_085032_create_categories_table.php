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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parent_id');
            $table->timestamps();
        });

        Schema::create('categories_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Products::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Categories::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_products');
        Schema::dropIfExists('categories');
    }
};
