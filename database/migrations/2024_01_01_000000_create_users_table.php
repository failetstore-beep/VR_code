<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['owner','admin','merchant']);
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->string('locale')->default('en');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('users');
    }
};
