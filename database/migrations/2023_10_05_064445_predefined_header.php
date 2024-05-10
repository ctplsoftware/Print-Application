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
        Schema::create('predefined_header', function (Blueprint $table) {
            $table->id();
            $table->string('product_type',50)->nullable();
            $table->string('label_type',50)->nullable(); 
            $table->string('label_name',50)->nullable();  
            $table->string('product_name',50)->nullable(); 
            $table->string('product_id',50)->nullable(); 
            $table->string('comments',50)->nullable(); 
            $table->string('static_field_1',50)->nullable(); 
            $table->string('static_field_2',50)->nullable(); 
            $table->string('static_field_3',50)->nullable(); 
            $table->string('static_field_4',50)->nullable(); 
            $table->string('static_field_5',50)->nullable(); 
            $table->string('static_field_6',50)->nullable(); 
            $table->string('static_field_7',50)->nullable(); 
            $table->string('static_field_8',50)->nullable(); 
            $table->string('static_field_9',50)->nullable(); 
            $table->string('static_field_10',50)->nullable(); 
            $table->string('batch_number',50)->nullable(); 
            $table->date('date_of_manufacturing',50)->nullable(); 
            $table->date('date_of_expiry',50)->nullable(); 
            $table->date('date_of_retest',50)->nullable(); 
            $table->integer('no_of_container')->nullable(); 
            $table->string('b_field1',50)->nullable(); 
            $table->string('b_field2',50)->nullable(); 
            $table->string('b_field3',50)->nullable(); 
            $table->string('b_field4',50)->nullable(); 
            $table->string('b_field5',50)->nullable(); 
            $table->string('gloabl_field1',50)->nullable(); 
            $table->string('gloabl_field2',50)->nullable(); 
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
        Schema::dropIfExists('predefined_header');
    }
};
