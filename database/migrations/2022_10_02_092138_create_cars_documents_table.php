<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('car_id');
            $table->foreign('car_id')
                  ->references('id')
                  ->on('cars')->onDelete('cascade');        
            
            $table->string('document_id');
            $table->foreign('document_id')
                  ->references('id')
                  ->on('documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars_documents');
    }
};
