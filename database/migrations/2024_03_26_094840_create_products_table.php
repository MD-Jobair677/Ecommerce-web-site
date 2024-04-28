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
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade')->onDelete('cascade');
            $table->foreignId('subcategorie_id')->constrained()->onDelete('cascade')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image');
            $table->decimal('price',10,2);
            $table->decimal('compareprice',10,2)->nullable();
            $table->string('sku');
            $table->string('barcode');
            $table->integer('qty');
            $table->boolean('is_active')->default(true);
            $table->enum('is_featured',['yes','no'])->default('yes');
            $table->string('slug');
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
