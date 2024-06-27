<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('copies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade'); // Add status_id
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('copies');
    }
};
