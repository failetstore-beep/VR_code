<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('embeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('token');
            $table->string('default_mode')->default('model');
            $table->string('lang_default')->default('en');
            $table->json('allowed_domains')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('embeds');
    }
};
