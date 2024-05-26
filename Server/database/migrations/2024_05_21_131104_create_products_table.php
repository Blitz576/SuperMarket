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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string('title');
            $table->text('description');
            $table->integer('stock');
            $table->decimal('price', 8, 2);
            $table->string('slug');
            $table->enum('rating',['1','2','3','4','5']);
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->unsignedBigInteger('category_id');
            $table->enum('show_in_slider',['show','hide'])->default('hide');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
