<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->integer('amount');
            $table->string('status')->default('pending'); // pending, settlement, expire, cancel
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('donasis');
    }
};
