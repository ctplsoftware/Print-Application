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
        Schema::create('label_design', function (Blueprint $table) {
            $table->id();
            $table->integer('label_id')->nullable();  
            $table->string('label_type_dynamic_predefined',50)->nullable();
            $table->string('label_name',100)->nullable();
            $table->integer('product_type')->nullable();
            $table->integer('label_type')->nullable();
            $table->string('version',50)->nullable();
            $table->string('version_status',50)->nullable();
            $table->string('status',50)->nullable();
            $table->string('approval_comments',50)->nullable();
            $table->integer('request_approval_id')->nullable();
            $table->string('request_status',50)->nullable(); 
            $table->integer('label_width')->nullable();
            $table->integer('label_height')->nullable();
            $table->string('productname_label_style',100)->nullable();
            $table->string('productid_label_style',100)->nullable();
            $table->string('productcomments_label_style',100)->nullable();
            $table->string('productstaticfield1_label_style',100)->nullable();
            $table->string('productstaticfield2_label_style',100)->nullable();
            $table->string('productstaticfield3_label_style',100)->nullable();
            $table->string('productstaticfield4_label_style',100)->nullable();
            $table->string('productstaticfield5_label_style',100)->nullable();
            $table->string('productstaticfield6_label_style',100)->nullable();
            $table->string('productstaticfield7_label_style',100)->nullable();
            $table->string('productstaticfield8_label_style',100)->nullable();
            $table->string('productstaticfield9_label_style',100)->nullable();
            $table->string('productstaticfield10_label_style',100)->nullable();
            $table->string('batchno_label_style',100)->nullable();
            $table->string('dateofmanufacture_label_style',100)->nullable();
            $table->string('dateofexp_label_style',100)->nullable();
            $table->string('dateofretest_label_style',100)->nullable();
            $table->string('batchstaticfield1_label_style',100)->nullable();
            $table->string('batchstaticfield2_label_style',100)->nullable();
            $table->string('batchstaticfield3_label_style',100)->nullable();
            $table->string('batchstaticfield4_label_style',100)->nullable();
            $table->string('batchbstaticfield5_label_style',100)->nullable();
            $table->string('netweight_label_style',100)->nullable();
            $table->string('grossweight_label_style',100)->nullable();
            $table->string('tareweight_label_style',100)->nullable();
            $table->string('dynamicfield1_label_style',100)->nullable();
            $table->string('dynamicfield2_label_style',100)->nullable();
            $table->string('globalstaticfield1_label_style',100)->nullable();
            $table->string('globalstaticfield2_label_style',100)->nullable();
            $table->string('labelstaticfield1_label_style',100)->nullable();
            $table->string('labelstaticfield2_label_style',100)->nullable();
            $table->string('Freefield1_label_style',100)->nullable();
            $table->string('Freefield2_label_style',100)->nullable();
            $table->string('Freefield3_label_style',100)->nullable();
            $table->string('Freefield4_label_style',100)->nullable();
            $table->string('Freefield5_label_style',100)->nullable();
            $table->string('Freefield6_label_style',100)->nullable();
            $table->string('productname_labelposition',100)->nullable();
            $table->string('productid_labelposition',100)->nullable();
            $table->string('productcommentslabelposition',100)->nullable();
            $table->string('productstaticfield1_labelposition',100)->nullable();
            $table->string('productstaticfield2_labelposition',100)->nullable();
            $table->string('productstaticfield3_labelposition',100)->nullable();
            $table->string('productstaticfield4_labelposition',100)->nullable();
            $table->string('productstaticfield5_labelposition',100)->nullable();
            $table->string('product_pstaticfield6_labelposition',100)->nullable();
            $table->string('product_pstaticfield7_labelposition',100)->nullable();
            $table->string('product_pstaticfield8_labelposition',100)->nullable();
            $table->string('product_pstaticfield9_labelposition',100)->nullable();
            $table->string('product_pstaticfield10_labelposition',100)->nullable();
            $table->string('batchno_labelposition',100)->nullable();
            $table->string('dateofmanufacture_labelposition',100)->nullable();
            $table->string('dateofexp_labelposition',100)->nullable();
            $table->string('dateofretest_labelposition')->nullable();
            $table->string('batchstaticfield1_labelposition',100)->nullable();
            $table->string('batchstaticfield2_labelposition',100)->nullable();
            $table->string('batchstaticfield3_labelposition',100)->nullable();
            $table->string('batchstaticfield4_labelposition',100)->nullable();
            $table->string('batchstaticfield5_labelposition',100)->nullable();
            $table->string('containerno',100)->nullable();
            $table->string('netweight_labelposition',100)->nullable();
            $table->string('grossweight_labelposition',100)->nullable();
            $table->string('tareweight_labelposition',100)->nullable();
            $table->string('dynamicfield1_labelposition',100)->nullable();
            $table->string('dynamicfield2_labelposition',100)->nullable();
            $table->string('global_gstaticfield1_labelposition',100)->nullable();
            $table->string('global_gstaticfield2_labelposition',100)->nullable();
            $table->string('label_lstaticfield1_labelposition',100)->nullable();
            $table->string('label_lstaticfield2_labelposition',100)->nullable();
            $table->string('Freefield1_labelposition',100)->nullable();
            $table->string('Freefield2_labelposition',100)->nullable();
            $table->string('Freefield3_labelposition',100)->nullable();
            $table->string('Freefield4_labelposition',100)->nullable();
            $table->string('Freefield5_labelposition',100)->nullable();
            $table->string('Freefield6_labelposition',100)->nullable();
            $table->string('Freefield1_label_value',100)->nullable();
            $table->string('Freefield2_label_value',100)->nullable();
            $table->string('Freefield3_label_value',100)->nullable();
            $table->string('Freefield4_label_value',100)->nullable();
            $table->string('Freefield5_label_value',100)->nullable();
            $table->string('Freefield6_label_value',100)->nullable();
            $table->integer('code_size')->nullable();
            $table->string('code_type')->nullable();
            $table->string('labelstaticfield1_input',100)->nullable();
            $table->string('labelstaticfield2_input',100)->nullable();
            $table->string('code_position',100)->nullable();
            $table->string('productnamefn',100)->nullable();
            $table->string('productidfn',100)->nullable();
            $table->string('productcommentsfn',100)->nullable();
            $table->string('productstaticfield1fn',100)->nullable();
            $table->string('productstaticfield2fn',100)->nullable();
            $table->string('productstaticfield3fn',100)->nullable();
            $table->string('productstaticfield4fn',100)->nullable();
            $table->string('productstaticfield5fn',100)->nullable();
            $table->string('productstaticfield6fn',100)->nullable();
            $table->string('productstaticfield7fn',100)->nullable();
            $table->string('productstaticfield8fn',100)->nullable();
            $table->string('productstaticfield9fn',100)->nullable();
            $table->string('productstaticfield10fn',100)->nullable();
            $table->string('batchnofn',100)->nullable();
            $table->string('dateofmanufacturefn',100)->nullable();
            $table->string('dateofexpfn',100)->nullable();
            $table->string('dateofretestfn',100)->nullable();
            $table->string('batchstaticfield1fn',100)->nullable();
            $table->string('batchstaticfield2fn',100)->nullable();
            $table->string('batchstaticfield3fn',100)->nullable();
            $table->string('batchstaticfield4fn',100)->nullable();
            $table->string('batchstaticfield5fn',100)->nullable();
            $table->string('containernofn',100)->nullable();
            $table->string('netweightfn',100)->nullable();
            $table->string('grossweightfn',100)->nullable();
            $table->string('tareweightfn',100)->nullable();
            $table->string('dynamicfield1fn',100)->nullable();
            $table->string('dynamicfield2fn',100)->nullable();
            $table->string('globalstaticfield1fn',100)->nullable();
            $table->string('globalstaticfield2fn',100)->nullable();
            $table->string('globalimage1fn',100)->nullable();
            $table->string('globalimage2fn',100)->nullable();
            $table->string('labelstaticfield1fn',100)->nullable();
            $table->string('labelstaticfield2fn',100)->nullable();
            $table->string('labelimage1fn',100)->nullable();
            $table->string('labelimage2fn',100)->nullable();
            $table->string('Freefield1fn',100)->nullable();
            $table->string('Freefield2fn',100)->nullable();
            $table->string('Freefield3fn',100)->nullable();
            $table->string('Freefield4fn',100)->nullable();
            $table->string('Freefield5fn',100)->nullable();
            $table->string('Freefield6fn',100)->nullable();        
            $table->string('organizationname_label_style',100)->nullable();
            $table->string('organizationnamefn',100)->nullable();
            $table->string('organization_labelposition',100)->nullable();
            $table->string('CompanyName_label_style',100)->nullable();
            $table->string('nameofmfg_label_style',100)->nullable();
            $table->string('addressofmfg_label_style',100)->nullable();
            $table->string('licenceno_label_style',100)->nullable();
            $table->string('CompanyName_labelposition',100)->nullable();
            $table->string('licenceno_labelposition',100)->nullable();
            $table->string('nameofmfg_labelposition',100)->nullable();
            $table->string('addressofmfg_labelposition',100)->nullable();
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
        Schema::dropIfExists('label_design');
    }
};
