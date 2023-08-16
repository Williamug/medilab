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
        Schema::create('lab_service_result_option', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lab_service_id');
            $table->unsignedBigInteger('result_option_id');

            $table->foreign('lab_service_id')->references('id')->on('lab_services')->onDelete('cascade');
            $table->foreign('result_option_id')->references('id')->on('result_options')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_service_result_option');
    }
};
