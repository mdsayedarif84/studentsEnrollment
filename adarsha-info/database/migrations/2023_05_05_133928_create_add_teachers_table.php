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
        Schema::create('add_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
            $table->string('teacher_email')->unique();
            $table->string('address');
            $table->string('department');
            $table->string('designation');
            $table->string('teacher_phone');
            $table->string('joining_date');
            $table->string('teacher_image');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_teachers');
    }
};
