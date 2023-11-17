<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('status');
            $table->foreignId('id_user')->constrained('users');
            $table->timestamps();
        });

        DB::table("todos")->insert([
            "title" => "Darle de comer al perro" ,
            "status" => 0,
            "id_user" => 1,
        ]);

        DB::table("todos")->insert([
            "title" => "Hacer mi tarea antes de las 4" ,
            "status" => 1,
            "id_user" => 1,
        ]);

        DB::table("todos")->insert([
            "title" => "Correr en la mañana" ,
            "status" => 2,
            "id_user" => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
