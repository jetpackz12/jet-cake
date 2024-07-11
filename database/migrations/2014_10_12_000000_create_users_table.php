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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->integer('gender');
            $table->date('bdate');
            $table->string('pnumber');
            $table->string('province');
            $table->string('municipality');
            $table->string('village');
            $table->string('street');
            $table->string('username');
            $table->string('password');
            $table->integer('user_position')->default(2);
            $table->text('access_rule')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
