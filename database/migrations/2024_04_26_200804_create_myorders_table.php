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
        Schema::create('myorders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->double('subtotal',10,2);
            $table->double('shipping',10,2);
            $table->string('cupon',10,2)->nullable();
            $table->double('discount',10,2)->nullable();
            $table->double('garnd_total',10,2);
           


            //USER ADDRESS
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->foreignId('contrie_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('address');
            $table->string('apertment');
            $table->string('cty');
            $table->string('state');
            $table->string('zip');
            $table->string('mobail_number');
            $table->text('nots')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myorders');
    }
};
