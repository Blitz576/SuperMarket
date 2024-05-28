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
            $table->text('summary')->nullable();
            $table->text('description');
            $table->integer('stock');
            $table->decimal('price', 8, 2);
            $table->decimal('sale_price', 8, 2)->default(0.00);
            $table->string('slug')->nullable();
            $table->enum('rating',['1','2','3','4','5']);
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('show_in_homepage',['show','hide'])->default('hide');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
