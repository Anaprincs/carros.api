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
        schema::create('carros', function (Blueprint $table){
            $table->id();
            $table->string('marca')->nullabe(false);
            $table->string('modelo')->nullabe(false);
            $table->integer('ano')->nullabe(false);
            $table->string('placa')->nullabe(false);
            $table->string('veiculo')->nullabe(false);
            $table->decimal('venda')->nullabe(false);
            $table->timestamps();

        }) ;
    }
        
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
