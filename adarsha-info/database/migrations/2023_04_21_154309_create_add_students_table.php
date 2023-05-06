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
        Schema::create('add_students', function (Blueprint $table) {
            $table->id();
            $table->string('stu_name');
            $table->string('stu_roll');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('stu_email')->unique();
            $table->string('password');
            $table->string('stu_class');
            $table->string('address');
            $table->string('stu_phone');
            $table->string('admission_year');
            $table->string('stu_image');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_students');
    }
};
