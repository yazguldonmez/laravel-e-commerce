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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('short_description')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('kdv')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('title')->nullable();
            $table->enum('status', ['0', '1'])->nullable()->default('0');
            $table->longText('content')->nullable();

            //$table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();
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
