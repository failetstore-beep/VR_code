<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('type');
            $table->string('path');
            $table->float('width_mm')->nullable();
            $table->float('height_mm')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('assets');
    }
};
