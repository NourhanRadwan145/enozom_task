<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('borrow_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('copy_id')->constrained()->onDelete('cascade');
            $table->timestamp('borrowed_at')->nullable();
            $table->timestamp('expected_return_at')->nullable();
            $table->timestamp('returned_at')->nullable();
            $table->foreignId('return_status_id')->nullable()->constrained('statuses')->onDelete('cascade'); // Add return_status_id
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borrow_records');
    }
};
