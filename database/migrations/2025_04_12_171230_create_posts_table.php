<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('body');
            
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('category_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');


            
            $table->timestamp('published_at');

            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
