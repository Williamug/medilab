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
        Schema::create('adult_patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('guardian_id');
            $table->string('full_name');
            $table->string('gender');
            $table->integer('age')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('email')->nullable();
            $table->text('residence')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adult_patients');
    }
};
