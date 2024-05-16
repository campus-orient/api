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
        Schema::create('directions', function (Blueprint $table) {
            $table->integer('directions_id')->autoIncrement();
            $table->integer('interests_place_id');
            $table->integer('checkpoint_id_prev');
            $table->integer('checkpoint_id_next');
            $table->timestamps();

            $table->foreign('interests_place_id')->references('interests_place_id')->on('interests_places')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directions');
    }
};
