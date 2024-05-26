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
        Schema::create('bounds', function (Blueprint $table) {
            $table->integer('bound_id')->autoIncrement();
            $table->integer('interests_place_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('detour_forward');
            $table->string('detour_left');
            $table->string('detour_back');
            $table->string('detour_right');
            $table->timestamps();

            $table->foreign('interests_place_id')->references('interests_place_id')->on('interests_places')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bounds');
    }
};
