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
        Schema::create('documents_insurances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('insurance_id');
            $table->foreign('insurance_id')
                  ->references('id')
                  ->on('insurances')->onDelete('cascade');        
            
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
        Schema::dropIfExists('documents_insurances');
    }
};
