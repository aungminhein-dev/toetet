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
        Schema::create('public_posts', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('title');
            $table->integer('grade')->nullable();
            $table->longText('description');
            $table->string('viewer_type')->default('public');
            $table->string('post_type')->default('normal');
            $table->string('media')->nullable();
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_posts');
    }
};
