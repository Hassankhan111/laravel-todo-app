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
        Schema::create('todos', function (Blueprint $table) {
            $table->id('todo_id');
            $table->unsignedBigInteger('user_id'); // foreign key to users table
            $table->string('title')->nullable(); // required
            $table->text('description')->nullable(); // optional
            $table->enum('status', ['pending', 'in-progress', 'completed'])->default('pending');
            $table->date('due_date')->nullable();
            $table->timestamps();
             // Foreign key constraint
           $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
