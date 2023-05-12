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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('birthday');
            $table->string('admission_id');
            $table->string('father_name');
            $table->string('father_nrc');
            $table->string('mother_name');
            $table->string('mother_nrc');
            $table->string('siblings')->nullable();
            $table->integer('grade');
            $table->longText('address');
            $table->string('gender');
            $table->integer('parent_code');
            $table->string('status')->default('new');
            $table->string('image')->nullable();
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
