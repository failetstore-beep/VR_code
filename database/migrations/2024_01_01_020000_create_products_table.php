<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchant_id');
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->string('category')->nullable();
            $table->float('width_mm')->nullable();
            $table->float('height_mm')->nullable();
            $table->float('depth_mm')->nullable();
            $table->string('default_mode')->default('model');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('products');
    }
};
