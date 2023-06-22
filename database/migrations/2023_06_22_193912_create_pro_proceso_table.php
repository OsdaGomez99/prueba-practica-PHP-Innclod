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
        Schema::create('PRO_PROCESO', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->unsignedBigInteger('PRO_ID')->autoIncrement();
            $table->string('PRO_NOMBRE', 60);
            $table->string('PRO_PREFIJO', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRO_PROCESO');
    }
};
