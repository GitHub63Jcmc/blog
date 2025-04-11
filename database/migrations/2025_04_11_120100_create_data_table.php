<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100)
                ->default('Victor Arana');

            $table->boolean('is_active')
                    ->default(true); 

            $table->text('description')
                ->nullable(); //Opcional

            $table->integer('edad')
                ->unsigned();

            $table->timestamp('published_at')
                ->useCurrent();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
