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
        Schema::table('myorders', function (Blueprint $table) {
            $table->enum('paument_status',['paid','no'])->after('garnd_total')->default('no');
            $table->enum('status',['pending','shipped','delivered'])->after('paument_status')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('myorders', function (Blueprint $table) {
            $table->dropColumn('paument_status');
            $table->dropColumn('status');
        });
    }
};
