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
        Schema::create('documents_maintenances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('maintenance_id');
            $table->foreign('maintenance_id')
                  ->references('id')
                  ->on('maintenances')->onDelete('cascade');        
            
            $table->unsignedBigInteger('document_id');
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
        Schema::dropIfExists('documents_maintenances');
    }
};
