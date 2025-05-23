<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
             $table->integer('user_id');
            $table->string('image')->nullable();
            $table->text('ingredients')->nullable(); // วัตถุดิบ
            $table->text('steps')->nullable();       // ขั้นตอน
            $table->tinyInteger('duration')->nullable(); // ระยะเวลา (1-4)
            $table->tinyInteger('difficulty')->nullable(); // ระดับความยาก (1-3)
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
