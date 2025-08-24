<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('key');
            $table->string('en');
            $table->string('ar');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('locales');
    }
};
