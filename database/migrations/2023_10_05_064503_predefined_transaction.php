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
        //
        Schema::create('predefined_transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('predefine_header_id')->nullable();
            $table->decimal('net_weight',50)->nullable(); 
            $table->decimal('tare_weight',50)->nullable(); 
            $table->decimal('gross_weight',50)->nullable(); 
            $table->string('container_no',50)->nullable(); 
            $table->string('dynamic_field1',50)->nullable(); 
            $table->string('dynamic_field2',50)->nullable(); 
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('predefined_transaction');
    }
};
