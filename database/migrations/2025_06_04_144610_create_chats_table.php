<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('chats', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Asumsi user mengirim pesan
        $table->foreignId('dokter_id')->constrained('users')->onDelete('cascade'); // Menghubungkan ke dokter
        $table->text('message'); // Isi pesan
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('chats');
}
};
