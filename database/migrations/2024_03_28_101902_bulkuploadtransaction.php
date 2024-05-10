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
        Schema::create('bulkupload_dynamictransaction', function (Blueprint $table) {
            $table->id();
            $table->string('label_name',100)->nullable();
            $table->string('Freefield1_value',100)->nullable();
            $table->string('Freefield2_value',100)->nullable();
            $table->string('Freefield3_value',100)->nullable();
            $table->string('Freefield4_value',100)->nullable();
            $table->string('Freefield5_value',100)->nullable();
            $table->string('Freefield6_value',100)->nullable();
            $table->string('unit',100)->nullable();
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
        Schema::dropIfExists('bulkupload_dynamictransaction');
    }
};
