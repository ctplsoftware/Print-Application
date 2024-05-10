<?php

namespace App\Http\Controllers;

use App\Models\configuration;
use App\Models\LabelType;
use App\Models\ProductType;
use Auth;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function configuration(Request $request)
    {
        $config_data = configuration::orderby('id', 'desc')->first();
        // dd($config_data);
        $date_format = ['YYYY-MM-DD', 'DD-MM-YYYY', 'MMM-YYYY'];
        $container_count = ['/', 'of'];
        $decimal_length = ['1', '2', '3'];
        // dd($decimal_length);
        $configPermission['update'] = Auth::user()->checkPermission(['configuration_update']);
        return view('config.index', compact('config_data', 'date_format', 'container_count', 'decimal_length', 'configPermission'))->with('message', 'Updated Successfully');
    }

    public function configsave(Request $request)
    {
        // dd($request->all());

        // dd($request->image1);
        //product level
        if ($request->hasFile('g1_image') != false) {
            $g1_image = $request->file('g1_image')->store('globalimage', 'public');

        } elseif ($request->g1_image_path_previous != null) {

            $g1_image = $request->g1_image_path_previous;
        } else {
            // dd('else image1');
            $g1_image = null;
        }

        if ($request->hasFile('g2_image') != false) {
            $g2_image = $request->file('g2_image')->store('globalimage', 'public');
            // dd($imagePath);
        } elseif ($request->g2_image_path_previous != null) {
            // dd('elseif image1');
            $g2_image = $request->g2_image_path_previous;
        } else {
            // dd('else image1');
            $g2_image = null;
        }

        //request approval on/off

        if ($request->get('print_approval') == 'on') {
            $print_approval = 'on';

        } else {
            $print_approval = 'off';
        }

        if ($request->get('label_approval_flow') == 'on') {
            $label_approval_flow = 'on';

        } else {
            $label_approval_flow = 'off';
        }

        if ($request->get('print_preview') == 'on') {
            $print_preview = 'on';

        } else {
            $print_preview = 'off';
        }

        // product level on/off
        if ($request->get('p_name_use') == 'on') {
            $p_name_use = 'on';

        } else {
            $p_name_use = 'off';
        }
        if ($request->get('p_name_mandatory') == 'on') {
            $p_name_mandatory = 'on';

        } else {
            $p_name_mandatory = 'off';
        }
        if ($request->get('p_id_use') == 'on') {
            $p_id_use = 'on';

        } else {
            $p_id_use = 'off';
        }
        if ($request->get('p_id_mandatory') == 'on') {
            $p_id_mandatory = 'on';

        } else {
            $p_id_mandatory = 'off';
        }

        if ($request->get('p_comments_use') == 'on') {
            $p_comments_use = 'on';

        } else {
            $p_comments_use = 'off';
        }
        if ($request->get('p_comments_mandatory') == 'on') {
            $p_comments_mandatory = 'on';

        } else {
            $p_comments_mandatory = 'off';
        }
        if ($request->get('p_field1_use') == 'on') {
            $p_field1_use = 'on';

        } else {
            $p_field1_use = 'off';
        }
        if ($request->get('p_field1_mandatory') == 'on') {
            $p_field1_mandatory = 'on';

        } else {
            $p_field1_mandatory = 'off';
        }

        if ($request->get('p_field2_use') == 'on') {
            $p_field2_use = 'on';

        } else {
            $p_field2_use = 'off';
        }
        if ($request->get('p_field2_mandatory') == 'on') {
            $p_field2_mandatory = 'on';

        } else {
            $p_field2_mandatory = 'off';
        }
        if ($request->get('p_field3_use') == 'on') {
            $p_field3_use = 'on';

        } else {
            $p_field3_use = 'off';
        }
        if ($request->get('p_field3_mandatory') == 'on') {
            $p_field3_mandatory = 'on';

        } else {
            $p_field3_mandatory = 'off';
        }
        if ($request->get('p_field4_use') == 'on') {
            $p_field4_use = 'on';

        } else {
            $p_field4_use = 'off';
        }
        if ($request->get('p_field4_mandatory') == 'on') {
            $p_field4_mandatory = 'on';

        } else {
            $p_field4_mandatory = 'off';
        }

        if ($request->get('p_field5_use') == 'on') {
            $p_field5_use = 'on';

        } else {
            $p_field5_use = 'off';
        }
        if ($request->get('p_field5_mandatory') == 'on') {
            $p_field5_mandatory = 'on';

        } else {
            $p_field5_mandatory = 'off';
        }

        if ($request->get('p_field6_use') == 'on') {
            $p_field6_use = 'on';

        } else {
            $p_field6_use = 'off';
        }
        if ($request->get('p_field6_mandatory') == 'on') {
            $p_field6_mandatory = 'on';

        } else {
            $p_field6_mandatory = 'off';
        }

        if ($request->get('p_field7_use') == 'on') {
            $p_field7_use = 'on';

        } else {
            $p_field7_use = 'off';
        }
        if ($request->get('p_field7_mandatory') == 'on') {
            $p_field7_mandatory = 'on';

        } else {
            $p_field7_mandatory = 'off';
        }

        if ($request->get('p_field8_use') == 'on') {
            $p_field8_use = 'on';

        } else {
            $p_field8_use = 'off';
        }
        if ($request->get('p_field8_mandatory') == 'on') {
            $p_field8_mandatory = 'on';

        } else {
            $p_field8_mandatory = 'off';
        }

        if ($request->get('p_field9_use') == 'on') {
            $p_field9_use = 'on';

        } else {
            $p_field9_use = 'off';
        }
        if ($request->get('p_field9_mandatory') == 'on') {
            $p_field9_mandatory = 'on';

        } else {
            $p_field9_mandatory = 'off';
        }

        if ($request->get('p_field10_use') == 'on') {
            $p_field10_use = 'on';

        } else {
            $p_field10_use = 'off';
        }
        if ($request->get('p_field10_mandatory') == 'on') {
            $p_field10_mandatory = 'on';

        } else {
            $p_field10_mandatory = 'off';
        }

        if ($request->get('p_image1_use') == 'on') {
            $p_image1_use = 'on';

        } else {
            $p_image1_use = 'off';
        }
        if ($request->get('p_image1_mandatory') == 'on') {
            $p_image1_mandatory = 'on';

        } else {
            $p_image1_mandatory = 'off';
        }

        if ($request->get('p_image2_use') == 'on') {
            $p_image2_use = 'on';

        } else {
            $p_image2_use = 'off';
        }
        if ($request->get('p_image2_mandatory') == 'on') {
            $p_image2_mandatory = 'on';

        } else {
            $p_image2_mandatory = 'off';
        }

        //batch level
        if ($request->get('serialno_use') == 'on') {
            $serialno_use = 'on';

        } else {
            $serialno_use = 'off';
        }
        if ($request->get('serialno_mandatory') == 'on') {
            $serialno_mandatory = 'on';

        } else {
            $serialno_mandatory = 'off';
        }

        if ($request->get('batch_use') == 'on') {
            $batch_use = 'on';

        } else {
            $batch_use = 'off';
        }
        if ($request->get('batch_mandatory') == 'on') {
            $batch_mandatory = 'on';

        } else {
            $batch_mandatory = 'off';
        }

        if ($request->get('no_of_container_use') == 'on') {
            $no_of_container_use = 'on';

        } else {
            $no_of_container_use = 'off';
        }
        if ($request->get('no_of_container_mandatory') == 'on') {
            $no_of_container_mandatory = 'on';

        } else {
            $no_of_container_mandatory = 'off';
        }

        if ($request->get('printcount_use') == 'on') {
            $printcount_use = 'on';

        } else {
            $printcount_use = 'off';
        }
        if ($request->get('printcount_mandatory') == 'on') {
            $printcount_mandatory = 'on';

        } else {
            $printcount_mandatory = 'off';
        }

        if ($request->get('date_of_manufacturing_use') == 'on') {
            $date_of_manufacturing_use = 'on';

        } else {
            $date_of_manufacturing_use = 'off';
        }
        if ($request->get('date_of_manufacturing_mandatory') == 'on') {
            $date_of_manufacturing_mandatory = 'on';

        } else {
            $date_of_manufacturing_mandatory = 'off';
        }

        if ($request->get('date_of_expiry_use') == 'on') {
            $date_of_expiry_use = 'on';

        } else {
            $date_of_expiry_use = 'off';
        }
        if ($request->get('date_of_expiry_mandatory') == 'on') {
            $date_of_expiry_mandatory = 'on';

        } else {
            $date_of_expiry_mandatory = 'off';
        }

        if ($request->get('date_of_retest_use') == 'on') {
            $date_of_retest_use = 'on';

        } else {
            $date_of_retest_use = 'off';
        }
        if ($request->get('date_of_retest_mandatory') == 'on') {
            $date_of_retest_mandatory = 'on';

        } else {
            $date_of_retest_mandatory = 'off';
        }

        if ($request->get('b_field1_use') == 'on') {
            $b_field1_use = 'on';

        } else {
            $b_field1_use = 'off';
        }
        if ($request->get('b_field1_mandatory') == 'on') {
            $b_field1_mandatory = 'on';

        } else {
            $b_field1_mandatory = 'off';
        }

        if ($request->get('b_field2_use') == 'on') {
            $b_field2_use = 'on';

        } else {
            $b_field2_use = 'off';
        }
        if ($request->get('b_field2_mandatory') == 'on') {
            $b_field2_mandatory = 'on';

        } else {
            $b_field2_mandatory = 'off';
        }

        if ($request->get('b_field3_use') == 'on') {
            $b_field3_use = 'on';

        } else {
            $b_field3_use = 'off';
        }
        if ($request->get('b_field3_mandatory') == 'on') {
            $b_field3_mandatory = 'on';

        } else {
            $b_field3_mandatory = 'off';
        }

        if ($request->get('b_field4_use') == 'on') {
            $b_field4_use = 'on';

        } else {
            $b_field4_use = 'off';
        }
        if ($request->get('b_field4_mandatory') == 'on') {
            $b_field4_mandatory = 'on';

        } else {
            $b_field4_mandatory = 'off';
        }

        if ($request->get('b_field5_use') == 'on') {
            $b_field5_use = 'on';

        } else {
            $b_field5_use = 'off';
        }
        if ($request->get('b_field5_mandatory') == 'on') {
            $b_field5_mandatory = 'on';

        } else {
            $b_field5_mandatory = 'off';
        }

        //Container level

        if ($request->get('container_use') == 'on') {
            $container_use = 'on';

        } else {
            $container_use = 'off';
        }
        if ($request->get('container_mandatory') == 'on') {
            $container_mandatory = 'on';

        } else {
            $container_mandatory = 'off';
        }

        if ($request->get('net_weight_use') == 'on') {
            $net_weight_use = 'on';

        } else {
            $net_weight_use = 'off';
        }
        if ($request->get('net_weight_mandatory') == 'on') {
            $net_weight_mandatory = 'on';

        } else {
            $net_weight_mandatory = 'off';
        }

        if ($request->get('tare_weight_use') == 'on') {
            $tare_weight_use = 'on';

        } else {
            $tare_weight_use = 'off';
        }
        if ($request->get('tare_weight_mandatory') == 'on') {
            $tare_weight_mandatory = 'on';

        } else {
            $tare_weight_mandatory = 'off';
        }

        if ($request->get('gross_weight_use') == 'on') {
            $gross_weight_use = 'on';

        } else {
            $gross_weight_use = 'off';
        }
        if ($request->get('gross_weight_mandatory') == 'on') {
            $gross_weight_mandatory = 'on';

        } else {
            $gross_weight_mandatory = 'off';
        }

        if ($request->get('d_field1_use') == 'on') {
            $d_field1_use = 'on';

        } else {
            $d_field1_use = 'off';
        }
        if ($request->get('d_field1_mandatory') == 'on') {
            $d_field1_mandatory = 'on';

        } else {
            $d_field1_mandatory = 'off';
        }

        if ($request->get('d_field2_use') == 'on') {
            $d_field2_use = 'on';

        } else {
            $d_field2_use = 'off';
        }
        if ($request->get('d_field2_mandatory') == 'on') {
            $d_field2_mandatory = 'on';

        } else {
            $d_field2_mandatory = 'off';
        }

        //global level
        if ($request->get('g_field1_use') == 'on') {
            $g_field1_use = 'on';

        } else {
            $g_field1_use = 'off';
        }
        if ($request->get('g_field1_mandatory') == 'on') {
            $g_field1_mandatory = 'on';

        } else {
            $g_field1_mandatory = 'off';
        }

        if ($request->get('g_field2_use') == 'on') {
            $g_field2_use = 'on';

        } else {
            $g_field2_use = 'off';
        }
        if ($request->get('g_field2_mandatory') == 'on') {
            $g_field2_mandatory = 'on';

        } else {
            $g_field2_mandatory = 'off';
        }

        if ($request->get('g_image1_use') == 'on') {
            $g_image1_use = 'on';

        } else {
            $g_image1_use = 'off';
        }
        if ($request->get('g_image1_mandatory') == 'on') {
            $g_image1_mandatory = 'on';

        } else {
            $g_image1_mandatory = 'off';
        }

        if ($request->get('g_image2_use') == 'on') {
            $g_image2_use = 'on';

        } else {
            $g_image2_use = 'off';
        }
        if ($request->get('g_image2_mandatory') == 'on') {
            $g_image2_mandatory = 'on';

        } else {
            $g_image2_mandatory = 'off';
        }

        //label level

        if ($request->get('l_field1_use') == 'on') {
            $l_field1_use = 'on';

        } else {
            $l_field1_use = 'off';
        }
        if ($request->get('l_field1_mandatory') == 'on') {
            $l_field1_mandatory = 'on';

        } else {
            $l_field1_mandatory = 'off';
        }

        if ($request->get('l_field2_use') == 'on') {
            $l_field2_use = 'on';

        } else {
            $l_field2_use = 'off';
        }
        if ($request->get('l_field2_mandatory') == 'on') {
            $l_field2_mandatory = 'on';

        } else {
            $l_field2_mandatory = 'off';
        }

        if ($request->get('image1_use') == 'on') {
            $image1_use = 'on';

        } else {
            $image1_use = 'off';
        }
        if ($request->get('image1_mandatory') == 'on') {
            $image1_mandatory = 'on';

        } else {
            $image1_mandatory = 'off';
        }

        if ($request->get('image2_use') == 'on') {
            $image2_use = 'on';

        } else {
            $image2_use = 'off';
        }
        if ($request->get('image2_mandatory') == 'on') {
            $image2_mandatory = 'on';

        } else {
            $image2_mandatory = 'off';
        }

        //product type
        if ($request->get('product_type_data1_use') == 'on') {
            $product_type_data1_use = 'on';

        } else {
            $product_type_data1_use = 'off';
        }

        if ($request->get('product_type_data2_use') == 'on') {
            $product_type_data2_use = 'on';

        } else {
            $product_type_data2_use = 'off';
        }

        if ($request->get('product_type_data3_use') == 'on') {
            $product_type_data3_use = 'on';

        } else {
            $product_type_data3_use = 'off';
        }

        if ($request->get('product_type_data4_use') == 'on') {
            $product_type_data4_use = 'on';

        } else {
            $product_type_data4_use = 'off';
        }

        //Label Type
        if ($request->get('label_type_data1_use') == 'on') {
            $label_type_data1_use = 'on';

        } else {
            $label_type_data1_use = 'off';
        }

        if ($request->get('label_type_data2_use') == 'on') {
            $label_type_data2_use = 'on';

        } else {
            $label_type_data2_use = 'off';
        }
        if ($request->get('label_type_data3_use') == 'on') {
            $label_type_data3_use = 'on';

        } else {
            $label_type_data3_use = 'off';
        }
        if ($request->get('label_type_data4_use') == 'on') {
            $label_type_data4_use = 'on';

        } else {
            $label_type_data4_use = 'off';
        }

        configuration::create([
            'organization_field_name' =>$request->organization_field_name,
            'organization_name' => $request->organization_name,
            'date_format' => $request->date_format,
            'container_count' => $request->container_count,
            'decimal_count' => $request->decimal_count,
            'barcode_delimiter' => $request->barcode_delimiter,
            'print_preview' => $print_preview,
            'product_approval_flow' => $print_approval,
            'label_approval_flow' => $label_approval_flow,
            'product_name' => $request->product_name,
            'product_name_use' => $p_name_use,
            'product_name_mandatory' => $p_name_mandatory,
            'product_id' => $request->product_id,
            'product_id_use' => $p_id_use,
            'product_id_mandatory' => $p_id_mandatory,
            'p_static_field1' => $request->p_static_field_1,
            'p_field1_use' => $p_field1_use,
            'p_field1_mandatory' => $p_field1_mandatory,
            'comments' => $request->comments,
            'comments_use' => $p_comments_use,
            'comments_mandatory' => $p_comments_mandatory,
            'p_static_field2' => $request->p_static_field_2,
            'p_field2_use' => $p_field2_use,
            'p_field2_mandatory' => $p_field2_mandatory,
            'p_static_field3' => $request->p_static_field_3,
            'p_field3_use' => $p_field3_use,
            'p_field3_mandatory' => $p_field3_mandatory,
            'p_static_field4' => $request->p_static_field_4,
            'p_field4_use' => $p_field4_use,
            'p_field4_mandatory' => $p_field4_mandatory,
            'p_static_field5' => $request->p_static_field_5,
            'p_field5_use' => $p_field5_use,
            'p_field5_mandatory' => $p_field5_mandatory,
            'p_static_field6' => $request->p_static_field_6,
            'p_field6_use' => $p_field6_use,
            'p_field6_mandatory' => $p_field6_mandatory,
            'p_static_field7' => $request->p_static_field_7,
            'p_field7_use' => $p_field7_use,
            'p_field7_mandatory' => $p_field7_mandatory,
            'p_static_field8' => $request->p_static_field_8,
            'p_field8_use' => $p_field8_use,
            'p_field8_mandatory' => $p_field8_mandatory,
            'p_static_field9' => $request->p_static_field_9,
            'p_field9_use' => $p_field9_use,
            'p_field9_mandatory' => $p_field9_mandatory,
            'p_static_field10' => $request->p_static_field_10,
            'p_field10_use' => $p_field10_use,
            'p_field10_mandatory' => $p_field10_mandatory,
            'p_image_field1' => $request->p_image_field1,
            'p_image1_use' => $p_image1_use,
            'p_image1_mandatory' => $p_image1_mandatory,
            'p_image_field2' => $request->p_image_field2,
            'p_image2_use' => $p_image2_use,
            'p_image2_mandatory' => $p_image2_mandatory,
            'serialno' => $request->serialno,
            'serialno_use' => 'on',
            'serialno_mandatory' => 'on',
            'batch_number' => $request->batch_number,
            'batch_use' => $batch_use,
            'batch_mandatory' => $batch_mandatory,
            'no_of_container' => $request->no_of_container,
            'no_of_container_use' => $no_of_container_use,
            'no_of_container_mandatory' => $no_of_container_mandatory,
            'print_count' => $request->print_count,
            'printcount_use' => $printcount_use,
            'printcount_mandatory' => $printcount_mandatory,
            'date_of_manufacturing' => $request->date_of_manufacturing,
            'date_of_manufacturing_use' => $date_of_manufacturing_use,
            'date_of_manufacturing_mandatory' => $date_of_manufacturing_mandatory,
            'date_of_expiry' => $request->date_of_expiry,
            'date_of_expiry_use' => $date_of_expiry_use,
            'date_of_expiry_mandatory' => $date_of_expiry_mandatory,
            'date_of_retest' => $request->date_of_retest,
            'date_of_retest_use' => $date_of_retest_use,
            'date_of_retest_mandatory' => $date_of_retest_mandatory,
            'b_static_field1' => $request->b_static_field1,
            'b_field1_use' => $b_field1_use,
            'b_field1_mandatory' => $b_field1_mandatory,
            'b_static_field2' => $request->b_static_field2,
            'b_field2_use' => $b_field2_use,
            'b_field2_mandatory' => $b_field2_mandatory,
            'b_static_field3' => $request->b_static_field3,
            'b_field3_use' => $b_field3_use,
            'b_field3_mandatory' => $b_field3_mandatory,
            'b_static_field4' => $request->b_static_field4,
            'b_field4_use' => $b_field4_use,
            'b_field4_mandatory' => $b_field4_mandatory,
            'b_static_field5' => $request->b_static_field5,
            'b_field5_use' => $b_field5_use,
            'b_field5_mandatory' => $b_field5_mandatory,
            'container_no' => $request->container_no,
            'container_use' => $container_use,
            'container_mandatory' => $container_mandatory,
            'dynamic_field1' => $request->dynamic_field1,
            'd_field1_use' => $d_field1_use,
            'd_field1_mandatory' => $d_field1_mandatory,
            'dynamic_field2' => $request->dynamic_field2,
            'd_field2_use' => $d_field2_use,
            'd_field2_mandatory' => $d_field2_mandatory,
            'net_weight' => $request->net_weight,
            'net_weight_use' => $net_weight_use,
            'net_weight_mandatory' => $net_weight_mandatory,
            'tare_weight' => $request->tare_weight,
            'tare_weight_use' => $tare_weight_use,
            'tare_weight_mandatory' => $tare_weight_mandatory,
            'gross_weight' => $request->gross_weight,
            'gross_weight_use' => $gross_weight_use,
            'gross_weight_mandatory' => $gross_weight_mandatory,
            'global_fieldname1' => $request->global_fieldname1,
            'global_fieldname2' => $request->global_fieldname2,
            'global_static_field1' => $request->global_static_field1,
            'g_field1_use' => $g_field1_use,
            'g_field1_mandatory' => $g_field1_mandatory,
            'global_static_field2' => $request->global_static_field2,
            'g_field2_use' => $g_field2_use,
            'g_field2_mandatory' => $g_field2_mandatory,
            'global_image1' => $request->global_image1,
            'g_image1_use' => $g_image1_use,
            'g_image1_mandatory' => $g_image1_mandatory,
            'global_image2' => $request->global_image2,
            'g_image2_use' => $g_image2_use,
            'g_image2_mandatory' => $g_image2_mandatory,
            'g1_image' => $g1_image,
            'g2_image' => $g2_image,
            'label_static_field1' => $request->label_static_field1,
            'l_field1_use' => $l_field1_use,
            'l_field1_mandatory' => $l_field1_mandatory,
            'label_static_field2' => $request->label_static_field2,
            'l_field2_use' => $l_field1_use,
            'l_field2_mandatory' => $l_field1_mandatory,
            'image1' => $request->image1,
            'image1_use' => $image1_use,
            'image1_mandatory' => $image1_mandatory,
            'image2' => $request->image2,
            'image2_use' => $image2_use,
            'image2_mandatory' => $image2_mandatory,
            'product_type_data1' => $request->product_type_data1,
            'product_type_data2' => $request->product_type_data2,
            'product_type_data3' => $request->product_type_data3,
            'product_type_data4' => $request->product_type_data4,
            'label_type_data1' => $request->label_type_data1,
            'label_type_data2' => $request->label_type_data2,
            'label_type_data3' => $request->label_type_data3,
            'label_type_data4' => $request->label_type_data4,
            'product_type_data1_use' => $product_type_data1_use,
            'product_type_data2_use' => $product_type_data2_use,
            'product_type_data3_use' => $product_type_data3_use,
            'product_type_data4_use' => $product_type_data4_use,
            'label_type_data1_use' => $label_type_data1_use,
            'label_type_data2_use' => $label_type_data2_use,
            'label_type_data3_use' => $label_type_data3_use,
            'label_type_data4_use' => $label_type_data4_use,
            'g1_image' => $g1_image,
            'g2_image' => $g2_image,
            'password_length' => $request->pwd_length,
            'password_validity' => $request->pwd_validity,
            'failed_attempt' => $request->failed_attempt,
            'logout_time' => $request->logout_time,
            'serialization' => $request->serialization,
            'product' => $request->product,
        ]);

        // Assuming the following arrays contain the necessary information
        $productTypeData = [
            'product_type_data1' => $request->product_type_data1,
            'product_type_data2' => $request->product_type_data2,
            'product_type_data3' => $request->product_type_data3,
            'product_type_data4' => $request->product_type_data4,
        ];

        $labelTypeData = [
            'label_type_data1' => $request->label_type_data1,
            'label_type_data2' => $request->label_type_data2,
            'label_type_data3' => $request->label_type_data3,
            'label_type_data4' => $request->label_type_data4,
        ];

        // Truncate the table outside the loop
        ProductType::truncate();

        // Insert new records for $productTypeData
        foreach ($productTypeData as $field => $label) {
            $status = $request->get($field . '_use') == 'on' ? 'Active' : 'Inactive';

            ProductType::create([
                'product_type' => $label,
                'status' => $status,
            ]);
        }

        // Truncate the table outside the loop
        LabelType::truncate();

        // Insert new records for $labelTypeData
        foreach ($labelTypeData as $field => $label) {
            $status = $request->get($field . '_use') == 'on' ? 'Active' : 'Inactive';
            LabelType::create([
                'label_type_name' => $label,
                'status' => $status,
            ]);
        }

        // $config_data = configuration::orderby('id','desc')->first();
        // $date_format = ['YYYY-MM-DD', 'dd-MMM-yyyy', 'MMM-yyyy'];
        // $container_count = ['/', 'of'];
        // $decimal_length = ['1', '2', '3'];
        // dd($container_count);
        return redirect('/configuration')->with('message', 'Updated successfully');

    }
}
