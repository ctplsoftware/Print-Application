<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('product_master', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',255)->nullable(); 
            $table->bigInteger('product_id')->nullable(); 
            $table->string('static_field1',255)->nullable(); 
            $table->string('static_field2',255)->nullable(); 
            $table->string('static_field3',255)->nullable(); 
            $table->string('static_field4',255)->nullable(); 
            $table->string('static_field5',255)->nullable(); 
            $table->string('static_field6',255)->nullable(); 
            $table->string('static_field7',255)->nullable(); 
            $table->string('static_field8',255)->nullable(); 
            $table->string('static_field9',255)->nullable(); 
            $table->string('static_field10',255)->nullable(); 
            $table->string('global_field1',255)->nullable(); 
            $table->string('global_field2',255)->nullable(); 
            // $table->string('product_image1', 255)->nullable(); // Adjust the length as needed
            // $table->string('product_image2', 255)->nullable(); // Adjust the length as needed  
            $table->string('comments',255)->nullable(); 
            $table->string('status',50)->nullable(); 
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('request_approval_status',50)->nullable();
            $table->string('approval_rejection_comments',50)->nullable();
            $table->integer('approved_by')->nullable();
            $table->timestamp('approved_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('product_master');
    }
};
