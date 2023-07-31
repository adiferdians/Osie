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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('title');
            $table->string('sub_title');
            $table->text('address');
            $table->text('scope');
            $table->string('number');
            $table->string('number_convert');
            $table->string('effective');
            $table->string('expired');
            $table->string('date');
            $table->string('status');
            $table->string('iso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
