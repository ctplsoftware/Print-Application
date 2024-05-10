<?php

namespace App\Http\Controllers;

use App\Models\configuration;
// use Illuminate\Support\Facades\Storage;
use App\Models\LabelDesign;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\LabelType;
use App\Models\ProductType;
use Auth;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use DB;

// shipper label design controller by navin bs on 12/10/2023
class LabelController extends Controller
{
    public function labeldesign()
    {
        $config_data = configuration::orderby('id', 'desc')->first();
        // dd($config_data);
        $productType = ProductType::where('status', 'Active')->get();
        // dd($type);
        $labeltype = LabelType::where('status', 'Active')->get();
        //dd($labeltype,$producttype);


        return view('label.label', compact('config_data', 'productType', 'labeltype'));
    }

    public function savelabeldesign(Request $request)
    {
        // dd($request->all());
        $config_data = configuration::orderby('id', 'desc')->first();

        $linesData = json_decode($request->linesData);
        if ($request->hiddentype == 'Shipping label') {

            if ($request->has("labelimage1_upload")) {
                $label_image1 = $request->file("labelimage1_upload")->store("labelimage", "public");
            } else {
                $label_image1 = null;
            }

            if ($request->has("labelimage2_upload")) {
                $label_image2 = $request->file("labelimage2_upload")->store("labelimage", "public");
            } else {
                $label_image2 = null;
            }

            if($request->code_type === 'QRcode'){
               $code_type = 'QRcode';
            }else if($request->code_type === 'GS1'){
                $code_type = 'GS1';
            }else if($request->code_type === 'Barcode'){
                $code_type = 'Barcode';
            }else{
                $code_type = 'select';

            }

            if($config_data->label_approval_flow === 'off'){
                $status = 'Approved';
            }else{
                $status = 'Requested';
            }

            // dd($label_image1, $label_image2);

            // dd("12");
            // $imagePath = $request->file('labelimage')->store('label_images'); // 'label_images' is the disk defined in filesystems.php
            $label = LabelDesign::create([
                'label_id' => $request->get('label_id'),
                'label_type_dynamic_predefined' => $request->get('predefined_dynamic'),
                'label_name' => $request->get('labelname'),
                'version' => $request->get('version'),
                'version_status' => 'Current',
                'status' => 'Active',
                // 'approval_comments' => $request->get('approval_comments'),
                'request_approval_id' => auth::user()->id,
                'request_status' => $status,
                'product_type' => $request->get('producttype_input'),
                'label_type' => $request->get('labeltype_input'),
                'label_width' => $request->get('width'),
                'label_height' => $request->get('height'),
                //label style for product
                'productname_label_style' => $request->get('productname_label_style'),
                'productid_label_style' => $request->get('productid_label_style'),
                'productcomments_label_style' => $request->get('productcomments_label_style'),
                'productstaticfield1_label_style' => $request->get('productstaticfield1_label_style'),
                'productstaticfield2_label_style' => $request->get('productstaticfield2_label_style'),
                'productstaticfield3_label_style' => $request->get('productstaticfield3_label_style'),
                'productstaticfield4_label_style' => $request->get('productstaticfield4_label_style'),
                'productstaticfield5_label_style' => $request->get('productstaticfield5_label_style'),
                'productstaticfield6_label_style' => $request->get('productstaticfield6_label_style'),
                'productstaticfield7_label_style' => $request->get('productstaticfield7_label_style'),
                'productstaticfield8_label_style' => $request->get('productstaticfield8_label_style'),
                'productstaticfield9_label_style' => $request->get('productstaticfield9_label_style'),
                'productstaticfield10_label_style' => $request->get('productstaticfield10_label_style'),

                //label style for bacth
                'batchno_label_style' => $request->get('batchno_label_style'),
                'serialno_label_style' => $request->get('serialno_label_style'),
                'dateofmanufacture_label_style' => $request->get('dateofmanufacture_label_style'),
                'dateofexp_label_style' => $request->get('dateofexp_label_style'),
                'dateofretest_label_style' => $request->get('dateofretest_label_style'),
                'batchstaticfield1_label_style' => $request->get('batchstaticfield1_label_style'),
                'batchstaticfield2_label_style' => $request->get('batchstaticfield2_label_style'),
                'batchstaticfield3_label_style' => $request->get('batchstaticfield3_label_style'),
                'batchstaticfield4_label_style' => $request->get('batchstaticfield4_label_style'),
                'batchstaticfield5_label_style' => $request->get('batchstaticfield5_label_style'),

                //label style for container
                'netweight_label_style' => $request->get('netweight_label_style'),
                'grossweight_label_style' => $request->get('grossweight_label_style'),
                'tareweight_label_style' => $request->get('tareweight_label_style'),
                'containerno_label_style' => $request->get('containerno_label_style'),
                'dynamicfield1_label_style' => $request->get('dynamicfield1_label_style'),
                'dynamicfield2_label_style' => $request->get('dynamicfield2_label_style'),

                //label style for global level
                'globalstaticfield1_label_style' => $request->get('globalstaticfield1_label_style'),
                'globalstaticfield2_label_style' => $request->get('globalstaticfield2_label_style'),

                //label style for label level
                'labelstaticfield1_label_style' => $request->get('labelstaticfield1_label_style'),
                'labelstaticfield2_label_style' => $request->get('labelstaticfield2_label_style'),

                //static free field label style
                'Freefield1_label_style' => $request->get('Freefield1_label_style'),
                'Freefield2_label_style' => $request->get('Freefield2_label_style'),
                'Freefield3_label_style' => $request->get('Freefield3_label_style'),
                'Freefield4_label_style' => $request->get('Freefield4_label_style'),
                'Freefield5_label_style' => $request->get('Freefield5_label_style'),
                'Freefield6_label_style' => $request->get('Freefield6_label_style'),

                //label position for product
                'productname_labelposition' => $request->get('productname_labelposition'),
                'productid_labelposition' => $request->get('productid_labelposition'),
                'productcomments_labelposition' => $request->get('productcomments_labelposition'),
                'productstaticfield1_labelposition' => $request->get('productstaticfield1_labelposition'),
                'productstaticfield2_labelposition' => $request->get('productstaticfield2_labelposition'),
                'productstaticfield3_labelposition' => $request->get('productstaticfield3_labelposition'),
                'productstaticfield4_labelposition' => $request->get('productstaticfield4_labelposition'),
                'productstaticfield5_labelposition' => $request->get('productstaticfield5_labelposition'),
                'productstaticfield6_labelposition' => $request->get('productstaticfield6_labelposition'),
                'productstaticfield7_labelposition' => $request->get('productstaticfield7_labelposition'),
                'productstaticfield8_labelposition' => $request->get('productstaticfield8_labelposition'),
                'productstaticfield9_labelposition' => $request->get('productstaticfield9_labelposition'),
                'productstaticfield10_labelposition' => $request->get('productstaticfield10_labelposition'),

                //label position for batch level
                'batchno_labelposition' => $request->get('batchno_labelposition'),
                'serialno_labelposition' => $request->get('serialno_labelposition'),
                'dateofmanufacture_labelposition' => $request->get('dateofmanufacture_labelposition'),
                'dateofexp_labelposition' => $request->get('dateofexp_labelposition'),
                'dateofretest_labelposition' => $request->get('dateofretest_labelposition'),
                'batchstaticfield1_labelposition' => $request->get('batchstaticfield1_labelposition'),
                'batchstaticfield2_labelposition' => $request->get('batchstaticfield2_labelposition'),
                'batchstaticfield3_labelposition' => $request->get('batchstaticfield3_labelposition'),
                'batchstaticfield4_labelposition' => $request->get('batchstaticfield4_labelposition'),
                'batchstaticfield5_labelposition' => $request->get('batchstaticfield5_labelposition'),

                //label position for container level
                'containerno' => $request->get('containerno'),
                'containerno_labelposition' => $request->get('containerno_labelposition'),
                'netweight_labelposition' => $request->get('netweight_labelposition'),
                'grossweight_labelposition' => $request->get('grossweight_labelposition'),
                'tareweight_labelposition' => $request->get('tareweight_labelposition'),
                'dynamicfield1_labelposition' => $request->get('dynamicfield1_labelposition'),
                'dynamicfield2_labelposition' => $request->get('dynamicfield2_labelposition'),

                //label position for global level
                'globalstaticfield1_labelposition' => $request->get('globalstaticfield1_labelposition'),
                'globalstaticfield2_labelposition' => $request->get('globalstaticfield2_labelposition'),

                //label position for label level
                'labelstaticfield1_labelposition' => $request->get('labelstaticfield1_labelposition'),
                'labelstaticfield2_labelposition' => $request->get('labelstaticfield2_labelposition'),

                //label  position for free field
                'Freefield1_labelposition' => $request->get('Freefield1_labelposition'),
                'Freefield2_labelposition' => $request->get('Freefield2_labelposition'),
                'Freefield3_labelposition' => $request->get('Freefield3_labelposition'),
                'Freefield4_labelposition' => $request->get('Freefield4_labelposition'),
                'Freefield5_labelposition' => $request->get('Freefield5_labelposition'),
                'Freefield6_labelposition' => $request->get('Freefield6_labelposition'),

                //free field value input
                'Freefield1_label_value' => $request->get('freefield1_name_input'),
                'Freefield2_label_value' => $request->get('freefield2_name_input'),
                'Freefield3_label_value' => $request->get('freefield3_name_input'),
                'Freefield4_label_value' => $request->get('freefield4_name_input'),
                'Freefield5_label_value' => $request->get('freefield5_name_input'),
                'Freefield6_label_value' => $request->get('freefield6_name_input'),

                //code size and type
                'code_size' => $request->get('code_size'),
                'code_type' => $code_type,
                'code_position' => $request->get('code_position'),

                //QR code data
                'qrdata' => $request->get('dataObj'),

                //label input value
                'labelstaticfield1_input' => $request->get('labelstaticfield1_input'),
                'labelstaticfield2_input' => $request->get('labelstaticfield2_input'),

                //predefined function for product
                'productnamefn' => $request->get('productnamefn'),
                'productidfn' => $request->get('productidfn'),
                'productcommentsfn' => $request->get('productcommentsfn'),
                'productstaticfield1fn' => $request->get('productstaticfield1fn'),
                'productstaticfield2fn' => $request->get('productstaticfield2fn'),
                'productstaticfield3fn' => $request->get('productstaticfield3fn'),
                'productstaticfield4fn' => $request->get('productstaticfield4fn'),
                'productstaticfield5fn' => $request->get('productstaticfield5fn'),
                'productstaticfield6fn' => $request->get('productstaticfield6fn'),
                'productstaticfield7fn' => $request->get('productstaticfield7fn'),
                'productstaticfield8fn' => $request->get('productstaticfield8fn'),
                'productstaticfield9fn' => $request->get('productstaticfield9fn'),
                'productstaticfield10fn' => $request->get('productstaticfield10fn'),

                //predefined function for bacth
                'batchnofn' => $request->get('batchnofn'),
                'serialnofn' => $request->get('serialnofn'),
                'dateofmanufacturefn' => $request->get('dateofmanufacturefn'),
                'dateofexpfn' => $request->get('dateofexpfn'),
                'dateofretestfn' => $request->get('dateofretestfn'),
                'batchstaticfield1fn' => $request->get('batchstaticfield1fn'),
                'batchstaticfield2fn' => $request->get('batchstaticfield2fn'),
                'batchstaticfield3fn' => $request->get('batchstaticfield3fn'),
                'batchstaticfield4fn' => $request->get('batchstaticfield4fn'),
                'batchstaticfield5fn' => $request->get('batchstaticfield5fn'),

                //predefined function for container
                'containernofn' => $request->get('containernofn'),
                'netweightfn' => $request->get('netweightfn'),
                'grossweightfn' => $request->get('grossweightfn'),
                'tareweightfn' => $request->get('tareweightfn'),
                'dynamicfield1fn' => $request->get('dynamicfield1fn'),
                'dynamicfield2fn' => $request->get('dynamicfield2fn'),

                //predefined function for global
                'globalstaticfield1fn' => $request->get('globalstaticfield1fn'),
                'globalstaticfield2fn' => $request->get('globalstaticfield2fn'),
                // 'global_gimage1fn' => $request->get('global_gimage1fn'),
                // 'global_gimage2fn' => $request->get('global_gimage2fn'),

                //predefined function for label
                'labelstaticfield1fn' => $request->get('labelstaticfield1fn'),
                'labelstaticfield2fn' => $request->get('labelstaticfield2fn'),
                'labelimage1fn' => $request->get('labelimage1fn'),
                'labelimage2fn' => $request->get('labelimage2fn'),

                //predefined function
                'freefield1fn' => $request->get('freefield1fn'),
                'freefield2fn' => $request->get('freefield2fn'),
                'freefield3fn' => $request->get('freefield3fn'),
                'freefield4fn' => $request->get('freefield4fn'),
                'freefield5fn' => $request->get('freefield5fn'),
                'freefield6fn' => $request->get('freefield6fn'),

                //for later use company and unit
                'organizationname_label_style' => $request->get('organizationname_label_style'),
                'organizationname_labelposition' => $request->get('organizationname_labelposition'),
                'organizationnamefn' => $request->get('organizationnamefn'),
                'CompanyName_label_style' => $request->get('CompanyName_label_style'),
                'CompanyName_labelposition' => $request->get('CompanyName_labelposition'),
                'nameofmfg_label_style' => $request->get('nameofmfg_label_style'),
                'nameofmfg_labelposition' => $request->get('nameofmfg_labelposition'),
                'addressofmfg_label_style' => $request->get('addressofmfg_label_style'),
                'addressofmfg_labelposition' => $request->get('addressofmfg_labelposition'),
                'licenceno_label_style' => $request->get('licenceno_label_style'),
                'licenceno_labelposition' => $request->get('licenceno_labelposition'),
                'unit' => $request->get('unit'),

                // Images Upload && Images position
                'labelimage1_path' => $label_image1,
                'labelimage2_path' => $label_image2,
                'globalimage1_labelposition' => $request->get('globalimage1_labelposition'),
                'globalimage2_labelposition' => $request->get('globalimage2_labelposition'),
                'labelimage1_labelposition' => $request->get('labelimage1_labelposition'),
                'labelimage2_labelposition' => $request->get('labelimage2_labelposition'),

                //created by and updated by
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,

            ]);

            foreach($linesData as $line){
                // dd($line);
                $top = strval($line->top);
                $left = strval($line->left);
                $height = strval($line->height);
                $width = strval($line->width);

                $concatenatedValues = $top . "_" . $left . "_" . $height . "_" . $width;

                DB::table("line_circle_box")->insert([
                    "label_id" => $label->id,
                    "type" => "Line",
                    "position" => $concatenatedValues
                ]);
            }

            $label_design = LabelDesign::orderby("id", "DESC")->first();

            if ($request->get('predefined_dynamic') == 'predefined') {

                $predefine_dynamic = 'predefined shipper label';
            } else if ($request->get('predefined_dynamic') == 'dynamic') {
                $predefine_dynamic = 'dynamic shipper label';

            }
            $changes = array();
            $changes['attributes']['label_name'] = $request->get('labelname');
            $changes['attributes']['Label_Type'] = $predefine_dynamic;
            $changes['attributes']['department'] = 'Save as Label';

            // return redirect('/shippinglabellist');
            $label_design = LabelDesign::orderBy("id", "DESC")->first();

            $data = array('username' => Auth::user()->name, 'subject_name' => $label_design->label_name, 'api_label' => 'Label', 'subject_url' => url('/label_edit') . '/' . $label_design->id . '?j28o10e19l99as15g06ar19d98');
            // $data = array('data' => Auth::user()->name.' (Supervisor) has requested a label design ('.$request->get('labelname').').');
            // //dd($mail_to,$value->email);
            $label_design = LabelDesign::orderby("id", "DESC")->first();

        }
        if($config_data->label_approval_flow == 'on')
        {
            return redirect('/labellist')->with('success', 'label sends approval.');

        }
        else
        {
            return redirect('/labellist')->with('success', 'Form submitted successfully.');

        }

    }

    public function labeledit(Request $req)
    {

        $config_data = configuration::orderby('id', 'desc')->first();
        // dd($config_data);
        $shipper_print = LabelDesign::where('id', $req->segment(2))
            ->first();
        // dd($shipper_print);
        $productType = ProductType::where('status', 'Active')->get();
        $label_type = LabelType::where('status', 'Active')->get();
        $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();

        $productTypeValue = ProductType::where('id', $shipper_print->product_type)->pluck('id')->first();
        $labelTypeValue = LabelType::where('id', $shipper_print->label_type)->pluck('id')->first();
        // dd($labelTypeValue);
        $labelPermissionEdit['Edit'] = Auth::user()->checkPermission(['label_edit']);
        // dd($labelPermissionEdit);
        $labelPermission['Approve'] = Auth::user()->checkPermission(['label_approve']);
        // dd($labelPermission['Approve']);
        return view('label.labeledit', compact('shipper_print', 'productTypeValue', 'labelTypeValue', 'label_type', 'config_data', 'productType',
            'labelPermission', 'labelPermissionEdit','lines'));
    }
    public function labellist()
    {
        $config = configuration::orderby('id', 'desc')->first();
        $shipper_print = LabelDesign::orderby('id', 'desc')->get();



        $labelStatus = LabelDesign::orderby('id','desc')->get();
        $labelCreate = LabelDesign::orderby('id','desc')->where('status', 'Active')->where('request_status', 'Approved')->get();
        $labelRequest = LabelDesign::orderby('id','desc')->where('status', 'Active')->where('request_status', 'Requested')->get();
        $labelApprove = LabelDesign::orderby('id','desc')->where('status', 'Active')->where('request_status', 'Approved')->get();
        $labelReject = LabelDesign::orderby('id','desc')->where('status', 'Active')->where('request_status', 'Rejected')->get();
        // dd($labelCreate, $labelRequest, $labelApprove,$labelReject);
        // dd($shipper_print);
        $waitingCount = LabelDesign::where('request_status', 'Requested')->count();
        $approvedCount = LabelDesign::where('request_status', 'Approved')->count();
        $rejectedCount = LabelDesign::where('request_status', 'Rejected')->count();

        $approved = LabelDesign::orderby('id', 'desc')->where('request_status', 'Approved')->get();
        // dd($approved);
        $requested = LabelDesign::orderby('id', 'desc')->where('request_status', 'Requested')->get();
        $rejected = LabelDesign::orderby('id', 'desc')->where('request_status', 'Rejected')->get();
        //   dd($requested);
        $labelPermission['create'] = Auth::user()->checkPermission(['label_create']);
        // dd($labelPermission);
        return view('label.labellist', compact('shipper_print', 'config', 'requested', 'approved',
            'rejected', 'waitingCount', 'approvedCount', 'rejectedCount', 'labelPermission','labelCreate'));
    }

    public function labelnameValidation(Request $request)
    {
        //    dd('hbhvhbhbb');
        // dd($request->text);
        $labelNameExit = LabelDesign::where('label_name', $request->text)->exists();
        // dd($labelNameExit);
        return response()->json(['message' => $labelNameExit]);
    }
    public function labelsize(Request $request)
    {
        // dd($request->num);
        if ($request->text != null) {
            $data = $request->text;
        } else {
            $data = ' ';
        }
        $qrcode = QrCode::size($request->num)->generate($data);
        // dd($qrcode);
        $trimmed_qrcode = trim($qrcode, "Illuminate\Support\HtmlString");
        // dd($trimmed_qrcode);
        return response()->json($trimmed_qrcode);
    }

    public function labelupdate(Request $request, $id)
    {
        // dd($request->all());
        $config = configuration::orderby('id', 'desc')->first();
        $shipper_print = LabelDesign::orderby('id', 'desc')->get();
        $labelCreate = LabelDesign::orderby('id','desc')->where('status', 'Active')->where('request_status', 'Approved')->get();
        $waitingCount = LabelDesign::where('request_status', 'Requested')->count();
        $approvedCount = LabelDesign::where('request_status', 'Approved')->count();
        $rejectedCount = LabelDesign::where('request_status', 'Rejected')->count();
        $approved = LabelDesign::orderby('id', 'desc')->where('request_status', 'Approved')->get();
        $requested = LabelDesign::orderby('id', 'desc')->where('request_status', 'Requested')->get();
        $rejected = LabelDesign::orderby('id', 'desc')->where('request_status', 'Rejected')->get();
        $labelPermission['create'] = Auth::user()->checkPermission(['label_create']);

        //Images
        if ($request->has("labelimage1_upload")) {
            $label_image1 = $request->file("labelimage1_upload")->store("labelimage", "public");
        } else if($request->has("labelimage1_upload") == null && $request->get('labelimage1_labelposition') != "0px_0px_0px_0px") {
            $label_image1 = $request->get('old_labelimage1_upload_path');
        } else {
            $label_image1 = null;
        }

        if ($request->has("labelimage2_upload")) {
            $label_image2 = $request->file("labelimage2_upload")->store("labelimage", "public");
        }
        else if($request->has("labelimage2_upload") == null && $request->get('labelimage2_labelposition') != "0px_0px_0px_0px") {
            $label_image2 = $request->get('old_labelimage2_upload_path');
        }
        else{
            $label_image2 = null;
        }
        //request approval flow
        $config_data = configuration::orderby('id', 'desc')->first();
        if($config_data->label_approval_flow ==='off'){
            $status = 'Approved';
        }else{
            $status = 'Requested';
        }
        //If user approve
        if ($request->approvedata == "approve") {
            $user = User::find(Auth::user()->id);
            if (Hash::check($request->userPassword, $user->password) == false) {
            return redirect()->back()->with('msg', 'Invalid password!!')->with('swal', true);
            }
            LabelDesign::where('id', $id)->update([
                'request_status' => 'Approved',
                'approve_rejected_by' => auth::user()->id,
            ]);
            return redirect()->route('label.labellist', [
                'shipper_print' => $shipper_print,
                'config' => $config,
                'requested' => $requested,
                'approved' => $approved,
                'rejected' => $rejected,
                'waitingCount' => $waitingCount,
                'approvedCount' => $approvedCount,
                'rejectedCount' => $rejectedCount,
                'labelPermission' => $labelPermission,
                'labelCreate' => $labelCreate,
            ]);
        }

        elseif ($request->rejectdata == "reject") {
            $user = User::find(Auth::user()->id);
            if (Hash::check($request->userPassword, $user->password) == false) {
            return redirect()->back()->with('msg', 'Invalid password!!')->with('swal', true);
            }
            LabelDesign::where('id', $id)->update([
                'request_status' => 'Rejected',
                'approve_rejected_by' => auth::user()->id,
            ]);
            return redirect()->route('label.labellist', [
                'shipper_print' => $shipper_print,
                'config' => $config,
                'requested' => $requested,
                'approved' => $approved,
                'rejected' => $rejected,
                'waitingCount' => $waitingCount,
                'approvedCount' => $approvedCount,
                'rejectedCount' => $rejectedCount,
                'labelPermission' => $labelPermission,
                'labelCreate' => $labelCreate,
            ]);

        }

        else {
            // dd($request->all());
            LabelDesign::where('id', $id)->update([
                'request_status' => $status,
                'approve_rejected_by' => auth::user()->id,
                'label_id' => $request->get('label_id'),
                'label_type_dynamic_predefined' => $request->get('predefined_dynamic'),
                'label_name' => $request->get('labelname'),
                'version' => $request->get('version'),
                'version_status' => 'Current',
                'status' => 'Active',
                // 'approval_comments' => $request->get('approval_comments'),
                'product_type' => $request->get('producttype_input'),
                'label_type' => $request->get('labeltype_input'),
                'label_width' => $request->get('width'),
                'label_height' => $request->get('height'),

                //label style for product
                'productname_label_style' => $request->get('productname_label_style'),
                'productid_label_style' => $request->get('productid_label_style'),
                'productcomments_label_style' => $request->get('productcomments_label_style'),
                'productstaticfield1_label_style' => $request->get('productstaticfield1_label_style'),
                'productstaticfield2_label_style' => $request->get('productstaticfield2_label_style'),
                'productstaticfield3_label_style' => $request->get('productstaticfield3_label_style'),
                'productstaticfield4_label_style' => $request->get('productstaticfield4_label_style'),
                'productstaticfield5_label_style' => $request->get('productstaticfield5_label_style'),
                'productstaticfield6_label_style' => $request->get('productstaticfield6_label_style'),
                'productstaticfield7_label_style' => $request->get('productstaticfield7_label_style'),
                'productstaticfield8_label_style' => $request->get('productstaticfield8_label_style'),
                'productstaticfield9_label_style' => $request->get('productstaticfield9_label_style'),
                'productstaticfield10_label_style' => $request->get('productstaticfield10_label_style'),

                //label style for batch
                'batchno_label_style' => $request->get('batchno_label_style'),
                'serialno_label_style' => $request->get('serialno_label_style'),
                'dateofmanufacture_label_style' => $request->get('dateofmanufacture_label_style'),
                'dateofexp_label_style' => $request->get('dateofexp_label_style'),
                'dateofretest_label_style' => $request->get('dateofretest_label_style'),
                'batchstaticfield1_label_style' => $request->get('batchstaticfield1_label_style'),
                'batchstaticfield2_label_style' => $request->get('batchstaticfield2_label_style'),
                'batchstaticfield3_label_style' => $request->get('batchstaticfield3_label_style'),
                'batchstaticfield4_label_style' => $request->get('batchstaticfield4_label_style'),
                'batchstaticfield5_label_style' => $request->get('batchstaticfield5_label_style'),

                //label style for container
                'netweight_label_style' => $request->get('netweight_label_style'),
                'grossweight_label_style' => $request->get('grossweight_label_style'),
                'tareweight_label_style' => $request->get('tareweight_label_style'),
                'containerno_label_style' => $request->get('containerno_label_style'),
                'dynamicfield1_label_style' => $request->get('dynamicfield1_label_style'),
                'dynamicfield2_label_style' => $request->get('dynamicfield2_label_style'),

                //label style for global level
                'globalstaticfield1_label_style' => $request->get('globalstaticfield1_label_style'),
                'globalstaticfield2_label_style' => $request->get('globalstaticfield2_label_style'),

                //label style for label level
                'labelstaticfield1_label_style' => $request->get('labelstaticfield1_label_style'),
                'labelstaticfield2_label_style' => $request->get('labelstaticfield2_label_style'),

                //static free field label style
                'Freefield1_label_style' => $request->get('Freefield1_label_style'),
                'Freefield2_label_style' => $request->get('Freefield2_label_style'),
                'Freefield3_label_style' => $request->get('Freefield3_label_style'),
                'Freefield4_label_style' => $request->get('Freefield4_label_style'),
                'Freefield5_label_style' => $request->get('Freefield5_label_style'),
                'Freefield6_label_style' => $request->get('Freefield6_label_style'),

                //label position for product
                'productname_labelposition' => $request->get('productname_labelposition'),
                'productid_labelposition' => $request->get('productid_labelposition'),
                'productcomments_labelposition' => $request->get('productcomments_labelposition'),
                'productstaticfield1_labelposition' => $request->get('productstaticfield1_labelposition'),
                'productstaticfield2_labelposition' => $request->get('productstaticfield2_labelposition'),
                'productstaticfield3_labelposition' => $request->get('productstaticfield3_labelposition'),
                'productstaticfield4_labelposition' => $request->get('productstaticfield4_labelposition'),
                'productstaticfield5_labelposition' => $request->get('productstaticfield5_labelposition'),
                'productstaticfield6_labelposition' => $request->get('productstaticfield6_labelposition'),
                'productstaticfield7_labelposition' => $request->get('productstaticfield7_labelposition'),
                'productstaticfield8_labelposition' => $request->get('productstaticfield8_labelposition'),
                'productstaticfield9_labelposition' => $request->get('productstaticfield9_labelposition'),
                'productstaticfield10_labelposition' => $request->get('productstaticfield10_labelposition'),

                //label position for batch level
                'batchno_labelposition' => $request->get('batchno_labelposition'),
                'serialno_labelposition' => $request->get('serialno_labelposition'),
                'dateofmanufacture_labelposition' => $request->get('dateofmanufacture_labelposition'),
                'dateofexp_labelposition' => $request->get('dateofexp_labelposition'),
                'dateofretest_labelposition' => $request->get('dateofretest_labelposition'),
                'batchstaticfield1_labelposition' => $request->get('batchstaticfield1_labelposition'),
                'batchstaticfield2_labelposition' => $request->get('batchstaticfield2_labelposition'),
                'batchstaticfield3_labelposition' => $request->get('batchstaticfield3_labelposition'),
                'batchstaticfield4_labelposition' => $request->get('batchstaticfield4_labelposition'),
                'batchstaticfield5_labelposition' => $request->get('batchstaticfield5_labelposition'),

                //label position for container level
                'containerno' => $request->get('containerno'),
                'containerno_labelposition' => $request->get('containerno_labelposition'),
                'netweight_labelposition' => $request->get('netweight_labelposition'),
                'grossweight_labelposition' => $request->get('grossweight_labelposition'),
                'tareweight_labelposition' => $request->get('tareweight_labelposition'),
                'dynamicfield1_labelposition' => $request->get('dynamicfield1_labelposition'),
                'dynamicfield2_labelposition' => $request->get('dynamicfield2_labelposition'),

                //label position for global level
                'globalstaticfield1_labelposition' => $request->get('globalstaticfield1_labelposition'),
                'globalstaticfield2_labelposition' => $request->get('globalstaticfield2_labelposition'),

                //label position for label level
                'labelstaticfield1_labelposition' => $request->get('labelstaticfield1_labelposition'),
                'labelstaticfield2_labelposition' => $request->get('labelstaticfield2_labelposition'),

                //label  position for free field
                'Freefield1_labelposition' => $request->get('Freefield1_labelposition'),
                'Freefield2_labelposition' => $request->get('Freefield2_labelposition'),
                'Freefield3_labelposition' => $request->get('Freefield3_labelposition'),
                'Freefield4_labelposition' => $request->get('Freefield4_labelposition'),
                'Freefield5_labelposition' => $request->get('Freefield5_labelposition'),
                'Freefield6_labelposition' => $request->get('Freefield6_labelposition'),

                //free field value input
                'Freefield1_label_value' => $request->get('freefield1_name_input'),
                'Freefield2_label_value' => $request->get('freefield2_name_input'),
                'Freefield3_label_value' => $request->get('freefield3_name_input'),
                'Freefield4_label_value' => $request->get('freefield4_name_input'),
                'Freefield5_label_value' => $request->get('freefield5_name_input'),
                'Freefield6_label_value' => $request->get('freefield6_name_input'),

                //code size and type
                'code_size' => $request->get('code_size'),
                'code_type' => $request->get('code_type'),
                'code_position' => $request->get('code_position'),

                //QR code data
                'qrdata' => $request->get('dataObj'),

                //global and stati field image update
                'labelimage1_path' => $label_image1,
                'labelimage2_path' => $label_image2,
                'globalimage1_labelposition' => $request->get('globalimage1_labelposition'),
                'globalimage2_labelposition' => $request->get('globalimage2_labelposition'),
                'labelimage1_labelposition' => $request->get('labelimage1_labelposition'),
                'labelimage2_labelposition' => $request->get('labelimage2_labelposition'),

                //label input value
                'labelstaticfield1_input' => $request->get('labelstaticfield1_input'),
                'labelstaticfield2_input' => $request->get('labelstaticfield2_input'),

                //predefined function for product
                'productnamefn' => $request->get('productnamefn'),
                'productidfn' => $request->get('productidfn'),
                'productcommentsfn' => $request->get('productcommentsfn'),
                'productstaticfield1fn' => $request->get('productstaticfield1fn'),
                'productstaticfield2fn' => $request->get('productstaticfield2fn'),
                'productstaticfield3fn' => $request->get('productstaticfield3fn'),
                'productstaticfield4fn' => $request->get('productstaticfield4fn'),
                'productstaticfield5fn' => $request->get('productstaticfield5fn'),
                'productstaticfield6fn' => $request->get('productstaticfield6fn'),
                'productstaticfield7fn' => $request->get('productstaticfield7fn'),
                'productstaticfield8fn' => $request->get('productstaticfield8fn'),
                'productstaticfield9fn' => $request->get('productstaticfield9fn'),
                'productstaticfield10fn' => $request->get('productstaticfield10fn'),

                //predefined function for bacth
                'batchnofn' => $request->get('batchnofn'),
                'serialnofn' => $request->get('serialnofn'),
                'dateofmanufacturefn' => $request->get('dateofmanufacturefn'),
                'dateofexpfn' => $request->get('dateofexpfn'),
                'dateofretestfn' => $request->get('dateofretestfn'),
                'batchstaticfield1fn' => $request->get('batchstaticfield1fn'),
                'batchstaticfield2fn' => $request->get('batchstaticfield2fn'),
                'batchstaticfield3fn' => $request->get('batchstaticfield3fn'),
                'batchstaticfield4fn' => $request->get('batchstaticfield4fn'),
                'batchstaticfield5fn' => $request->get('batchstaticfield5fn'),

                //predefined function for container
                'containernofn' => $request->get('containernofn'),
                'netweightfn' => $request->get('netweightfn'),
                'grossweightfn' => $request->get('grossweightfn'),
                'tareweightfn' => $request->get('tareweightfn'),
                'dynamicfield1fn' => $request->get('dynamicfield1fn'),
                'dynamicfield2fn' => $request->get('dynamicfield2fn'),

                //predefined function for global
                'globalstaticfield1fn' => $request->get('globalstaticfield1fn'),
                'globalstaticfield2fn' => $request->get('globalstaticfield2fn'),
                // 'global_gimage1fn' => $request->get('global_gimage1fn'),
                // 'global_gimage2fn' => $request->get('global_gimage2fn'),

                //predefined function for label
                'labelstaticfield1fn' => $request->get('labelstaticfield1fn'),
                'labelstaticfield2fn' => $request->get('labelstaticfield2fn'),
                'labelimage1fn' => $request->get('labelimage1fn'),
                'labelimage2fn' => $request->get('labelimage2fn'),

                //predefined function
                'freefield1fn' => $request->get('freefield1fn'),
                'freefield2fn' => $request->get('freefield2fn'),
                'freefield3fn' => $request->get('freefield3fn'),
                'freefield4fn' => $request->get('freefield4fn'),
                'freefield5fn' => $request->get('freefield5fn'),
                'freefield6fn' => $request->get('freefield6fn'),

                //for later use company and unit
                'organizationname_label_style' => $request->get('organizationname_label_style'),
                'organizationname_labelposition' => $request->get('organizationname_labelposition'),
                'organizationnamefn' => $request->get('organizationnamefn'),
                'CompanyName_label_style' => $request->get('CompanyName_label_style'),
                'CompanyName_labelposition' => $request->get('CompanyName_labelposition'),
                'nameofmfg_label_style' => $request->get('nameofmfg_label_style'),
                'nameofmfg_labelposition' => $request->get('nameofmfg_labelposition'),
                'addressofmfg_label_style' => $request->get('addressofmfg_label_style'),
                'addressofmfg_labelposition' => $request->get('addressofmfg_labelposition'),
                'licenceno_label_style' => $request->get('licenceno_label_style'),
                'licenceno_labelposition' => $request->get('licenceno_labelposition'),
                'unit' => $request->get('unit'),

            ]);
            if($config_data->label_approval_flow == 'on')
            {
                return redirect()->back()->with('success', 'label sends approval.');
            }
            else
            {
                return redirect()->back()->with('success', 'Form updated successfully.');

            }


            }

    }
}
