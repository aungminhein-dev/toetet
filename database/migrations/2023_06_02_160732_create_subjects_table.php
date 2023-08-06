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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('myanmar')->nullable();
            $table->integer('english')->nullable();
            $table->integer('maths')->nullable();
            $table->integer('science')->nullable();
            $table->integer('geography')->nullable();
            $table->integer('history')->nullable();
            $table->integer('biology')->nullable();
            $table->integer('economy')->nullable();
            $table->integer('physics')->nullable();
            $table->integer('chemistry')->nullable();
            $table->integer('social')->nullable();
            $table->string('exam_date')->nullable();
            $table->string('exam_description')->nullable();
            $table->integer('grade');
            $table->integer('given_marks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
