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
        Schema::create('configuration',function(blueprint $table){
            $table->id();
            $table->text('organization_name',50)->nullable();
            $table->text('date_format',50)->nullable();
            $table->text('container_count',50)->nullable();
            $table->text('product_name',50)->nullable();
            $table->text('product_name_use',50)->nullable();
            $table->text('product_name_mandatory',50)->nullable();
            $table->text('product_id',50)->nullable();
            $table->text('product_id_use',50)->nullable();
            $table->text('product_id_mandatory',50)->nullable();
            $table->text('p_static_field1')->nullable();
            $table->text('p_field1_use',50)->nullable();
            $table->text('p_field1_mandatory',50)->nullable();
            $table->text('comments',50)->nullable();
            $table->text('comments_use',50)->nullable();
            $table->text('comments_mandatory',50)->nullable();
            $table->text('p_static_field2',50)->nullable();
            $table->text('p_field2_use',50)->nullable();
            $table->text('p_field2_mandatory',50)->nullable();
            $table->text('p_static_field3',50)->nullable();
            $table->text('p_field3_use',50)->nullable();
            $table->text('p_field3_mandatory',50)->nullable();
            $table->text('p_static_field4',50)->nullable();
            $table->text('p_field4_use',50)->nullable();
            $table->text('p_field4_mandatory',50)->nullable();
            $table->text('p_static_field5',50)->nullable();
            $table->text('p_field5_use',50)->nullable();
            $table->text('p_field5_mandatory',50)->nullable();
            $table->text('p_static_field6',50)->nullable();
            $table->text('p_field6_use',50)->nullable();
            $table->text('p_field6_mandatory',50)->nullable();
            $table->text('p_static_field7',50)->nullable();
            $table->text('p_field7_use',50)->nullable();
            $table->text('p_field7_mandatory',50)->nullable();
            $table->text('p_static_field8',50)->nullable();
            $table->text('p_field8_use',50)->nullable();
            $table->text('p_field8_mandatory',50)->nullable();
            $table->text('p_static_field9',50)->nullable();
            $table->text('p_field9_use',50)->nullable();
            $table->text('p_field9_mandatory',50)->nullable();
            $table->text('p_static_field10',50)->nullable();
            $table->text('p_field10_use',50)->nullable();
            $table->text('p_field10_mandatory',50)->nullable();
            $table->text('batch_number',50)->nullable();
            $table->text('batch_use',50)->nullable();
            $table->text('batch_mandatory',50)->nullable();
            $table->text('no_of_container',50)->nullable();
            $table->text('no_of_container_use',50)->nullable();
            $table->text('no_of_container_mandatory',50)->nullable();
            $table->text('date_of_manufacturing')->nullable();
            $table->text('date_of_manufacturing_use',50)->nullable();
            $table->text('date_of_manufacturing_mandatory',50)->nullable();
            $table->text('date_of_expiry')->nullable();
            $table->text('date_of_expiry_use',50)->nullable();
            $table->text('date_of_expiry_mandatory',50)->nullable();
            $table->text('date_of_retest')->nullable();
            $table->text('date_of_retest_use',50)->nullable();
            $table->text('date_of_retest_mandatory',50)->nullable();
            $table->text('b_static_field1',50)->nullable();
            $table->text('b_field1_use',50)->nullable();
            $table->text('b_field1_mandatory',50)->nullable();
            $table->text('b_static_field2',50)->nullable();
            $table->text('b_field2_use',50)->nullable();
            $table->text('b_field2_mandatory',50)->nullable();
            $table->text('b_static_field3',50)->nullable();
            $table->text('b_field3_use',50)->nullable();
            $table->text('b_field3_mandatory',50)->nullable();
            $table->text('b_static_field4',50)->nullable();
            $table->text('b_field4_use',50)->nullable();
            $table->text('b_field4_mandatory',50)->nullable();
            $table->text('b_static_field5',50)->nullable();
            $table->text('b_field5_use',50)->nullable();
            $table->text('b_field5_mandatory',50)->nullable();
            $table->text('container_no',50)->nullable();
            $table->text('container_use',50)->nullable();
            $table->text('container_mandatory',50)->nullable();
            $table->text('dynamic_field1',50)->nullable();
            $table->text('d_field1_use',50)->nullable();
            $table->text('d_field1_mandatory',50)->nullable();
            $table->text('dynamic_field2',50)->nullable();
            $table->text('d_field2_use',50)->nullable();
            $table->text('d_field2_mandatory',50)->nullable();
            $table->text('net_weight',50)->nullable();
            $table->text('net_weight_use',50)->nullable();
            $table->text('net_weight_mandatory',50)->nullable();
            $table->text('tare_weight',50)->nullable();
            $table->text('tare_weight_use',50)->nullable();
            $table->text('tare_weight_mandatory',50)->nullable();
            $table->text('gross_weight',50)->nullable();
            $table->text('gross_weight_use',50)->nullable();
            $table->text('gross_weight_mandatory',50)->nullable();
            $table->text('global_static_field1',50)->nullable();
            $table->text('g_field1_use',50)->nullable();
            $table->text('g_field1_mandatory',50)->nullable();
            $table->text('global_static_field2',50)->nullable();
            $table->text('g_field2_use',50)->nullable();
            $table->text('g_field2_mandatory',50)->nullable();
            $table->text('label_static_field1',50)->nullable();
            $table->text('l_field1_use',50)->nullable();
            $table->text('l_field1_mandatory',50)->nullable();
            $table->text('label_static_field2',50)->nullable();
            $table->text('l_field2_use',50)->nullable();
            $table->text('l_field2_mandatory',50)->nullable();
            $table->text('image1',50)->nullable();
            $table->text('image1_use',50)->nullable();
            $table->text('image2_mandatory',50)->nullable();
            $table->text('image2',50)->nullable();
            $table->text('image2_use',50)->nullable();
            $table->text('image3_mandatory',50)->nullable();
            $table->integer('password_length')->nullable();
            $table->integer('password_validity')->nullable();
            $table->integer('failed_attempt')->nullable();
            $table->integer('logout_time')->nullable();
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
        Schema::dropIfExists('configuration');
    }
};
