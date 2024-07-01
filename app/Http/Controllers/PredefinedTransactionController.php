<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\productmaster;
use App\Models\LabelType;
use App\Models\configuration;
use App\Models\PredefinedTransaction;
use App\Models\ReprintTransaction;
use App\Models\DynamicTransaction;
use App\Models\PredefinedHeader;
use App\Models\ReprintHeader;
use App\Models\LabelDesign;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Auth;
use DB;

class PredefinedTransactionController extends Controller
{
    //
    public function index(Request $request)
    {
        $config=configuration::orderby('id','desc')->first();
        // dd($config);
        $product_type= ProductType::get();
        $label_type= LabelType::get();
        // dd($label_type);
        $product= productmaster::where('unit_id',auth::user()->unit_id )->orderBy('id','desc')->where('status','Active')
        ->where('request_approval_status', 'Approved')->get();
        // dd($product);
        $labelDesign = LabelDesign::where('unit_id',auth::user()->unit_id )->orderby('id','desc')->where('status','Active')->where('request_status', 'Approved')
        ->where('label_type_dynamic_predefined','predefined')->get();
        // dd($labelDesign);

        $header = PredefinedHeader::where('unit_id',auth::user()->unit_id )->orderBy('id','desc')->first();
        // dd($header);
        $decimal_length = ['1', '2', '3'];

        $url = 'Asgar'; // Replace with your desired URL or data.
        $qrCode = QrCode::size(300)->generate($url);
        return view('predefinedtransaction.index',compact('product_type','decimal_length','label_type','product','config','header','qrCode','labelDesign'));
    }
    public function update(Request $request)
    {
        // dd(4567);
        // dd($request->all());
        if ($request->print_status != 'Reprint' ) {
            // dd('ifff');
            // dd($request->all());
            $productMasterID =  productmaster::where('unit_id',auth::user()->unit_id)->where('product_name',$request->product_name)->select('id')->first();
            // dd($productMasterID->id);

            $predefinedHeaderId=PredefinedHeader::create([
                'product_type'=>$request->product_type,
                'label_type'=>$request->label_type,
                'label_name'=>$request->label_name,
                'product_name'=>$productMasterID->id,
                'batch_number'=>$request->batch_number,
                'date_of_manufacturing'=>$request->date_of_manufacturing,
                'date_of_expiry'=>$request->date_of_expiry,
                'date_of_retest'=>$request->date_of_retest,
                'b_field1'=>$request->b_static_field1,
                'b_field2'=>$request->b_static_field2,
                'b_field3'=>$request->b_static_field3,
                'b_field4'=>$request->b_static_field4,
                'b_field5'=>$request->b_static_field5,
                'prefix' => $request->prefix ?? $request->prefix_old,
                'suffix' => $request->suffix ?? $request->suffix_old,
                'serial_no' => $request->serialno ?? $request->serialno_old,
                'global_field1'=>$request->global_static_field1,
                'global_field2'=>$request->global_static_field1,
                'no_of_container'=>$request->no_of_container,
                'print_count'=>$request->print_count,
                'freefield1'=>$request->freefield1,
                'freefield2'=>$request->freefield2,
                'freefield3'=>$request->freefield3,
                'freefield4'=>$request->freefield4,
                'freefield5'=>$request->freefield5,
                'freefield6'=>$request->freefield6,
                'freefield7'=>$request->freefield7,
                'freefield8'=>$request->freefield8,
                'freefield9'=>$request->freefield9,
                'print_status'=>$request->print_status,
                'created_by' => auth::user()->id,
                'unit_id' => auth::user()->unit_id
            ]);
            $tableId = $request->s_no;
            if (isset($tableId) || $tableId > 0) {
                foreach ($tableId as $Id) {
                    PredefinedTransaction::create([
                        'predefine_header_id' => $predefinedHeaderId->id,
                        'net_weight' => $request->net_weight[$Id],
                        'tare_weight' => $request->tare_weight[$Id],
                        'gross_weight' => $request->gross_weight[$Id],
                        'container_no' => $request->container_current_no[$Id],
                        'dynamic_field1' => $request->dynamic_field1[$Id],
                        'dynamic_field2' => $request->dynamic_field2[$Id],
                        'unit_id'=>  auth::user()->unit_id
                    ]);
                }
            }
            else{
                PredefinedTransaction::create([
                    'predefine_header_id' => $predefinedHeaderId->id,
                ]);
            }
        }else {
            $predefinedHeaderId=PredefinedHeader::where('id',$request->transaction_id)->update([
                'batch_number'=>$request->batch_number,
                'date_of_manufacturing'=>$request->date_of_manufacturing,
                'date_of_expiry'=>$request->date_of_expiry,
                'date_of_retest'=>$request->date_of_retest,
                'b_field1'=>$request->b_static_field1,
                'b_field2'=>$request->b_static_field2,
                'b_field3'=>$request->b_static_field3,
                'b_field4'=>$request->b_static_field4,
                'b_field5'=>$request->b_static_field5,
                'global_field1'=>$request->global_static_field1,
                'global_field2'=>$request->global_static_field1,
                'no_of_container'=>$request->no_of_container,
                'print_count'=>$request->print_count,
                'print_status'=>$request->print_status,
                'created_by' => auth::user()->id,

            ]);
            $tableId = $request->s_no;
            if (isset($tableId) || $tableId > 0) {
                foreach ($tableId as $Id) {
                    PredefinedTransaction::where('id',$Id)->update([
                        'net_weight' => $request->net_weight[$Id],
                        'tare_weight' => $request->tare_weight[$Id],
                        'gross_weight' => $request->gross_weight[$Id],
                        'container_no' => $request->container_current_no[$Id],
                        'dynamic_field1' => $request->dynamic_field1[$Id],
                        'dynamic_field2' => $request->dynamic_field2[$Id],
                    ]);
                }
            }

        }
        $config_data = configuration::orderby('id','desc')->first();
        if ($config_data->print_preview == 'off') {
            return $this->print($request);
        }

        return response()->json(['success' => 'Updated Successfully']);
    }
    public function getProductData(Request $request)
    {
        // dd($request->all());
        $product_data=productmaster::where('unit_id',auth::user()->unit_id)->where('id',$request->product_id)->get();
        // dd($product_data);
        return response()->json($product_data);
    }

    public function generateQRCode()
    {
        $url = 'Asgar';
        $qrCode = QrCode::size(300)->generate($url);
        return view('qr-code', compact('qrCode'));
    }
    public function transactionList()
    {
        $config=configuration::orderby('id','desc')->first();
        // dd($config);
        $list = PredefinedHeader::where('predefined_header.unit_id',auth::user()->unit_id)->orderBy('predefined_header.id', 'desc')
        ->join('product_master', 'predefined_header.product_name', '=', 'product_master.id')
        ->select('product_master.product_name','predefined_header.product_type','predefined_header.label_type',
        'predefined_header.batch_number','predefined_header.no_of_container','predefined_header.created_at','predefined_header.id','predefined_header.print_count')
        ->get();
        // dd($list);
        $TransactionPermission['create'] = Auth::user()->checkPermission(['transaction_create']);
        // dd($TransactionPermission);
        return view('predefinedtransaction.list',compact('list','TransactionPermission','config'));
    }
    //Reprint blade page function
    public function reprintTransaction(Request $request,$id) {

        $reprintData= PredefinedHeader::where('predefined_header.unit_id',auth::user()->unit_id)->where('id',$id)->first();
        // dd($reprintData);
        $productName = productmaster::where('unit_id',auth::user()->unit_id )->where('id',$reprintData->product_name)->first();
        // dd($productName);
        $product_data=productmaster::where('unit_id',auth::user()->unit_id )->where('product_name',$productName->product_name)->first();
        // dd($product_data);
        $list=PredefinedTransaction::where('unit_id',auth::user()->unit_id)->where('predefine_header_id',$reprintData->id)->get();
        //monisha for reprint label work(17-11-23)
        $header=PredefinedHeader::where('unit_id',auth::user()->unit_id)->orderby('id','desc')->first();
        // dd($header);
        $designlabel = LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id',$reprintData->label_name)->first();
        // dd($designlabel);
        // $labelProductName = LabelDesign::where('label_name',$designlabel->labelName)
        // ->join('product_type_master','label_design.product_type','=','product_type_master.id')
        // ->join('label_type_master','label_design.Label_type','=','label_type_master.id')
        // ->select('product_type_master.product_type','label_type_master.label_type_name')
        // ->first();
        $labelProductName = LabelDesign::where('label_design.id', $reprintData->label_name)
       ->join('product_type_master as ptm', 'label_design.product_type', '=', 'ptm.id')
       ->join('label_type_master as ltm', 'label_design.Label_type', '=', 'ltm.id')
       ->where('label_design.unit_id',auth::user()->unit_id )
       ->select('ptm.product_type', 'ltm.label_type_name')
        ->first();
        $decimal_length = ['1', '2', '3'];
        // dd($labelProductName);
        $url = 'Asgar';
        $qrCode = QrCode::size(300)->generate($url);
        $product= productmaster::where('unit_id',auth::user()->unit_id)->get();
        $config=configuration::orderby('id','desc')->first();
        // dd($config);
        return view('predefinedtransaction.reprint',compact(
        'product','config','reprintData','product_data','list','header','designlabel','qrCode','labelProductName','decimal_length'));
    }
    public function printpreview(Request $req,$id)
    {
        $segment = request()->segment(2);
        // dd($segment);
        $labelID = LabelDesign::where('unit_id',auth::user()->unit_id)->where('id',$segment)->first();
        // dd($labelID->id);
        $config_data = configuration::orderby('id','desc')->first();
        // dd($config_data->no_of_container_use);
        $shipper_print = LabelDesign::where('unit_id',auth::user()->unit_id)->where('id',$labelID->id)->first();
        // dd($shipper_print);
        $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();
        // dd($lines);
        $label_name = LabelDesign::where('unit_id',auth::user()->unit_id)->where('id',$shipper_print->id)->first();
    // dd($label_name);
        $header=PredefinedHeader::where('unit_id',auth::user()->unit_id)->where('label_name',$shipper_print->id)->orderby('id','desc')->first();
        // dd($header);
        $productNameID = productmaster::where('unit_id',auth::user()->unit_id)->where('id',$header->product_name)->first();
        // dd($productNameID);
        $productData =productmaster::where('unit_id',auth::user()->unit_id)->where('product_name',$productNameID->product_name)->first();
        // dd($productData);
        $data1=PredefinedTransaction::where('unit_id',auth::user()->unit_id)->where('predefine_header_id',$header->id)->first();
        // dd($data1);


        return view('predefinedtransaction.printpreview',compact('shipper_print','config_data','data1','header','productData','label_name','lines'));
    }

    public function print(Request $request){
        // dd('printtttt');
        //   dd($request->all());
        // dd($request->segment(2));
        $config_data = configuration::orderby('id','desc')->first();
        // dd($config_data);
        if($config_data->print_preview == 'on'){
            $idsegment = LabelDesign::where('label_name',$request->segment(2))->first();
        }else{
            $idsegment = LabelDesign::where('id',$request->segment(2))->first();
        }
        // dd($idsegment);
          $labelNameId = LabelDesign::where('id',$idsegment->id)->first();
        //   dd($labelNameId);
          $labelID = LabelDesign::where('id',$labelNameId->id)->first();
        //   dd($labelID->label_name);

          $config_data = configuration::orderby('id','desc')->first();
          $shipper_print = LabelDesign::where('label_name',$labelID->label_name)->first();
        //   dd($shipper_print);
          $header=PredefinedHeader::where('unit_id',auth::user()->unit_id)->orderby('id','desc')->where('label_name',$shipper_print->id)->first();
        //   dd($header);
          $productNameID = productmaster::where('unit_id',auth::user()->unit_id)->where('id',$header->product_name)->first();
        //   dd($productNameID);
          $productData =productmaster::where('unit_id',auth::user()->unit_id)->where('product_name',$productNameID->product_name)->first();
          // dd($productData,$productNameID);
          $data1=PredefinedTransaction::where('unit_id',auth::user()->unit_id)->where('predefine_header_id',$header->id)->get();
        //   dd($data1);
          $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();

        return view('predefinedtransaction.printlabel',compact('shipper_print','lines','config_data','data1','header','productData','productNameID'));
    }



    public function batchNumberValidation(Request $request){
        $config = configuration::orderBy('id', 'desc')->first();
        $batchNumberExists = PredefinedHeader::where('unit_id',auth::user()->unit_id)->where('batch_number', $request->batchNumber)->exists();
        $message = $batchNumberExists ? "$config->batch_number already exists, are you sure you want to continue" : "$config->batch_number is available";
        return response()->json(['exists' => $batchNumberExists, 'message' => $message]);
    }

    public function dynamictransaction(Request $request)
    {
        //dd('testttt');
        $config = configuration::orderBy('id', 'desc')->first();
        $productName = productmaster::where('unit_id',auth::user()->unit_id)->orderBy('id', 'desc')->where('status','Active')->where('request_approval_status', 'Approved')->get();
        // dd($productName);

        $labelName = LabelDesign::where('unit_id',auth::user()->unit_id)->orderby('id','desc')->where('status','Active')->where('request_status', 'Approved')
        ->where('label_type_dynamic_predefined','dynamic')->get();
        // dd($labelName);

       return view('dynamictransaction.index',compact('productName','labelName','config'));
    }

    public function printdynamic(Request $request)
    {
      $segment = request()->segment(2);

      $label_name = LabelDesign::where('id',$segment)->first();
      $config_data = configuration::orderby('id','desc')->first();
      $lines = DB::table("line_circle_box")->where("label_id", $label_name->id)->get();

      return view('dynamictransaction.printpreview',compact('label_name','config_data','lines'));
    }
    public function dynamicsave(Request $request){
        // dd($request->all());
          $labelID = LabelDesign::where('label_design.id',$request->label_name)->first();
        // dd($labelID->id);
          DynamicTransaction::create([
            'product_name'=> $request->product_name,
            'label_name'  => $request->label_name,
            'no_of_label' => $request->no_of_label,
            'free_field1' => $request->freefield1,
            'free_field2' => $request->freefield2,
            'free_field3' => $request->freefield3,
            'free_field4' => $request->freefield4,
            'free_field5' => $request->freefield5,
            'free_field6' => $request->freefield6,
            'free_field7' => $request->freefield7,
            'free_field8' => $request->freefield8,
            'free_field9' => $request->freefield9,
            'printed_by'  => auth::user()->id,
            'unit_id' => auth::user()->unit_id,
        ]);
        $shipper_print = LabelDesign::where('label_design.id',$labelID->id)->first();
        // dd($shipper_print->id);

        $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();


        $header=DynamicTransaction::orderby('id','desc')->where('label_name',$shipper_print->id)->first();
        // dd($header);
        $labelstaticfield = LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id',$header->label_name)
        ->join('product_type_master','label_design.product_type','=','product_type_master.id')
                              ->join('label_type_master','label_design.Label_type','=','label_type_master.id')
                              ->select('product_type_master.product_type','label_type_master.label_type_name','label_design.labelstaticfield1_input',
                              'label_design.labelstaticfield2_input','label_design.Freefield1_label_value','label_design.Freefield2_label_value',
                              'label_design.Freefield3_label_value','label_design.Freefield4_label_value',
                              'label_design.Freefield5_label_value','label_design.Freefield6_label_value','label_design.Freefield7_label_value','label_design.Freefield8_label_value','label_design.Freefield9_label_value', )
                              ->first();
                              // dd( $labelstaticfield);



        $productNameID = productmaster::where('unit_id',auth::user()->unit_id)->where('id',$header->product_name)->first();
        // dd($productNameID);
        $productData =productmaster::where('unit_id',auth::user()->unit_id)->where('product_name',$productNameID->product_name)->first();
        // dd($productData);

        $config_data = configuration::orderby('id','desc')->first();
        return view('dynamictransaction.printdynamic',compact('header','lines','productData','config_data','shipper_print','labelstaticfield'));
    }

    public function labelnameagainstdata(Request $request){
          //  dd($request->labelName);
          $labelProductName = LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id',$request->labelName)
                              ->join('product_type_master','label_design.product_type','=','product_type_master.id')
                              ->join('label_type_master','label_design.Label_type','=','label_type_master.id')
                              ->select('product_type_master.product_type','label_type_master.label_type_name')
                              ->first();
                              // dd($labelProductName);
         $freefieldnames =LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id',$request->labelName)
         ->select('Freefield1_label_value','Freefield2_label_value','Freefield3_label_value',
         'Freefield4_label_value','Freefield5_label_value','Freefield6_label_value','Freefield7_label_value','Freefield8_label_value','Freefield9_label_value')->first();
        //  dd($freefieldnames);
        return response()->json(['success' => [
            'labelProductName' => $labelProductName,
            'freefieldnames' => $freefieldnames
        ]]);
    }

    public function labelNameDynamic(Request $request){
    //    dd($request->labelName);
       $labelData = LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id',$request->labelName)
       ->join('product_type_master','label_design.product_type','product_type_master.id')
       ->join('label_type_master','label_design.Label_type','label_type_master.id')
       ->select('product_type_master.product_type','label_type_master.label_type_name')
       ->first();
    //    dd($labelData);
       return response()->json(['success' => $labelData]);
    }

    public function reprint(Request $request) {
        // dd($request->all());
        $checkID = $request->checkId;
        // dd($checkID);
        $data1 = [];

        $labelNameId = LabelDesign::find($request->segment(2));
        // dd($labelNameId);

        $labelID = LabelDesign::find($labelNameId->id);
        // dd($labelID);

        // Get other required data
        $config_data = Configuration::orderby('id', 'desc')->first();
        $shipper_print = LabelDesign::where('label_name', $labelID->label_name)->first();
        // dd($shipper_print);


        $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();
        $header = PredefinedHeader::where('unit_id',auth::user()->unit_id)->where('label_name', $shipper_print->id)->where('id',$request->transaction_id)->first();
        // dd($header);

        $serialNo = PredefinedHeader::where('unit_id',auth::user()->unit_id)->where('id', $request->transaction_id)->orderby('id', 'desc')->first();
        $productNameID = Productmaster::where('unit_id', auth()->user()->unit_id)
        ->where('product_name', $header->product_name)
        ->first();
        $productData = $productNameID ? Productmaster::where('unit_id',auth::user()->unit_id)->where('product_name', $productNameID->product_name)->first() : null;

        // Check if $checkID is an array (multiple IDs selected) or a single value
        if (is_array($checkID)) {
            foreach ($checkID as $checkedId) {
                // dd($header->id);
                $tempData = PredefinedTransaction::where('unit_id',auth::user()->unit_id)->where('predefine_header_id', $header->id)
                ->where('id', $checkedId)
                    ->get()
                    ->toArray();

                // Merge the retrieved data into $data1
                $data1 = array_merge($data1, $tempData);
                // dd($data1);
            }
        } else {
            $data1 = PredefinedTransaction::where('unit_id',auth::user()->unit_id)->where('predefine_header_id', $header->id)
                ->where('id', $checkID)
                ->get()
                ->toArray();
        }

        return view('predefinedtransaction.print', compact('shipper_print', 'lines', 'config_data', 'data1', 'header', 'productData', 'serialNo', 'checkID'));
    }



    public function reprintTransactionPredefined(Request $request){
        //    dd($request->all());
           $reprintData= PredefinedHeader::where('unit_id',auth::user()->unit_id)->where('id',$id)->first();
        //    dd($reprintData);
           $productName = productmaster::where('unit_id',auth::user()->unit_id)->where('id',$reprintData->product_name)->first();
        //    dd($productName);
           $product_data=productmaster::where('unit_id',auth::user()->unit_id)->where('product_name',$productName->product_name)->first();
           // dd($product_data);
           $list=PredefinedTransaction::where('unit_id',auth::user()->unit_id)->where('predefine_header_id',$reprintData->id)->get();
           //monisha for reprint label work(17-11-23)
           $header=PredefinedHeader::where('unit_id',auth::user()->unit_id)->orderby('id','desc')->first();
           //dd($header);
           $designlabel = LabelDesign::where('unit_id',auth::user()->unit_id)->where('label_name',$reprintData->label_name)->first();
           // dd($designlabel);
           // $labelProductName = LabelDesign::where('label_name',$designlabel->labelName)
           // ->join('product_type_master','label_design.product_type','=','product_type_master.id')
           // ->join('label_type_master','label_design.Label_type','=','label_type_master.id')
           // ->select('product_type_master.product_type','label_type_master.label_type_name')
           // ->first();
           $labelProductName = LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_name', $reprintData->label_name)
          ->join('product_type_master as ptm', 'label_design.product_type', '=', 'ptm.id')
          ->join('label_type_master as ltm', 'label_design.Label_type', '=', 'ltm.id')
          ->select('ptm.product_type', 'ltm.label_type_name')
           ->first();
        //    dd($labelProductName);
           $config=configuration::orderby('id','desc')->first();
           return view('predefinedtransaction.reprint',compact(
           'product','config','reprintData','product_data','list','header','designlabel','qrCode','labelProductName'));


    }
    public function dynamicshow(Request $request){

        $dynamicData = DynamicTransaction::orderBy('dynamic_transaction.id', 'desc')
        ->join('product_master', 'dynamic_transaction.product_name', '=', 'product_master.id')
        ->where('dynamic_transaction.unit_id',auth::user()->unit_id )
        ->select('product_master.product_name', 'dynamic_transaction.no_of_label', 'dynamic_transaction.created_at','dynamic_transaction.printed_by')
        ->get();
        // dd($dynamicData);
        $TransactionPermission['create'] = Auth::user()->checkPermission(['transaction_create']);

        return view('dynamictransaction.show',compact('dynamicData','TransactionPermission'));
    }
    public function reprintList(Request $request) {
        // Get the latest configuration
        $config=configuration::orderby('id','desc')->first();
        // dd($config);
        $list = PredefinedHeader::where('predefined_header.unit_id',auth::user()->unit_id)->orderBy('predefined_header.id', 'desc')
        ->join('product_master', 'predefined_header.product_name', '=', 'product_master.id')
        ->select('product_master.product_name','predefined_header.product_type','predefined_header.label_type',
        'predefined_header.batch_number','predefined_header.no_of_container','predefined_header.created_at','predefined_header.id','predefined_header.print_count')
        ->get();
        // dd($list);
        $TransactionPermission['create'] = Auth::user()->checkPermission(['transaction_create']);
        // dd($TransactionPermission);
            return view('predefined-reprint.reprint-list',compact('list','TransactionPermission','config'));

        // $config = configuration::orderby('id', 'desc')->first();

        // // Subquery to get the latest created_at for each transaction_id
        // $subQuery = ReprintHeader::selectRaw('transaction_id, MAX(created_at) as latest')
        //     ->groupBy('transaction_id');

        // // Main query to get the latest record for each transaction_id
        // $latestRecords = ReprintHeader::joinSub($subQuery, 'latest_transactions', function ($join) {
        //         $join->on('reprint_header.transaction_id', '=', 'latest_transactions.transaction_id')
        //              ->on('reprint_header.created_at', '=', 'latest_transactions.latest');
        //     })
        //     ->join('product_master', 'reprint_header.product_name', '=', 'product_master.id')
        //     ->select('product_master.product_name', 'reprint_header.product_type', 'reprint_header.label_type',
        //              'reprint_header.batch_number', 'reprint_header.no_of_container', 'reprint_header.created_at',
        //              'reprint_header.id', 'reprint_header.print_count', 'reprint_header.reprint_count')
        //     ->orderBy('reprint_header.transaction_id', 'desc')
        //     ->get();
        // // dd($latestRecords);
        // return view('predefined-reprint.reprint-list', compact('latestRecords', 'config'));
    }

    public function reprintEdit(Request $request,$id) {
        // dd($request->all());
        $reprintData= PredefinedHeader::where('unit_id',auth::user()->unit_id )->where('id',$id)->first();
        // dd($reprintData);
        $productName = productmaster::where('unit_id',auth::user()->unit_id )->where('id',$reprintData->product_name)->first();
        // dd($productName);
        $product_data=productmaster::where('unit_id',auth::user()->unit_id )->where('product_name',$productName->product_name)->first();
        // dd($product_data);
        $list=PredefinedTransaction::where('unit_id',auth::user()->unit_id )->where('Predefine_header_id',$reprintData->id)->get();
        //monisha for reprint label work(17-11-23)
        $header=PredefinedHeader::where('unit_id',auth::user()->unit_id )->orderby('id','desc')->first();
        // dd($header);

        $designlabel = LabelDesign:: where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id',$reprintData->label_name)->first();

        $labelProductName = LabelDesign::where('label_design.id', $reprintData->label_name)
       ->join('product_type_master as ptm', 'label_design.product_type', '=', 'ptm.id')
       ->join('label_type_master as ltm', 'label_design.Label_type', '=', 'ltm.id')
       ->where('label_design.unit_id',auth::user()->unit_id )
       ->select('ptm.product_type', 'ltm.label_type_name')
        ->first();
        // dd($labelProductName);
        $url = 'Asgar';
        $qrCode = QrCode::size(300)->generate($url);
        $product= productmaster::where('unit_id',auth::user()->unit_id)->get();
        $config=configuration::orderby('id','desc')->first();
        $decimal_length = ['1', '2', '3'];
        $TransactionPermission['create'] = Auth::user()->checkPermission(['transaction_create']);

        // dd($config);
        return view('predefined-reprint.reprint-edit',compact(
        'product','config','reprintData','product_data','list','header','designlabel','qrCode','labelProductName','decimal_length','TransactionPermission'));
    }
    public function reprintUpdate(Request $request) {
        // dd($request->all());
        // if ($request->print_status != 'Reprint' ) {
            // dd($request->all());
            $productMasterID =  productmaster::where('unit_id',auth::user()->unit_id )->where('product_name',$request->product_name)->select('id')->first();
            $labelId =  LabelDesign::where('unit_id',auth::user()->unit_id )->where('label_name',$request->label_name)->select('id')->first();
            $checkedIds = $request->checkId ?? [];
            $no_of_container = count($checkedIds);
            // dd($no_of_container);
            $transactionExists = PredefinedHeader::where('unit_id',auth::user()->unit_id)->where('id', $request->transaction_id)->exists();
            // dd($transactionExists);

            if ($transactionExists) {
                $reprintHeaders = ReprintHeader::where('unit_id',auth::user()->unit_id)->where('transaction_id', $request->transaction_id)->get();

                if ($reprintHeaders->isEmpty()) {
                    $reprint_count = $no_of_container;
                } else {
                    $lastReprintHeader = $reprintHeaders->last();
                    $reprint_count = $lastReprintHeader->reprint_count + $no_of_container;
                }
            }
            // dd($reprint_count);


            $reprintHeaderId=ReprintHeader::create([
                'transaction_id' => $request->transaction_id,
                'product_type'=>$request->product_type,
                'label_type'=>$request->label_type,
                'label_name'=>$labelId->id,
                'product_name'=>$productMasterID->id,
                'batch_number'=>$request->batch_number,
                'date_of_manufacturing'=>$request->date_of_manufacturing,
                'date_of_expiry'=>$request->date_of_expiry,
                'date_of_retest'=>$request->date_of_retest,
                'b_field1'=>$request->b_static_field1,
                'b_field2'=>$request->b_static_field2,
                'b_field3'=>$request->b_static_field3,
                'b_field4'=>$request->b_static_field4,
                'b_field5'=>$request->b_static_field5,
                'prefix' => $request->prefix ?? $request->prefix_old,
                'suffix' => $request->suffix ?? $request->suffix_old,
                'serial_no' => $request->serialno ?? $request->serialno_old,
                'global_field1'=>$request->global_static_field1,
                'global_field2'=>$request->global_static_field2,
                'no_of_container'=>$no_of_container ?? null,
                'reprint_count' => $no_of_container,
                'print_count'=>$request->print_count,
                'freefield1'=>$request->freefield1,
                'freefield2'=>$request->freefield2,
                'freefield3'=>$request->freefield3,
                'freefield4'=>$request->freefield4,
                'freefield5'=>$request->freefield5,
                'freefield6'=>$request->freefield6,
                'freefield7'=>$request->freefield7,
                'freefield8'=>$request->freefield8,
                'freefield9'=>$request->freefield9,
                'print_status'=>$request->print_status,
                'created_by' => auth::user()->id,
            ]);
         // Retrieve the submitted values from the request
        $netweights = $request->netweight ?? [];
        $tareweights = $request->tareweight ?? [];
        $grossweights = $request->grossweight ?? [];
        $containerNos = $request->container_current_no ?? [];
        $dynamicField1 = $request->dynamic_field1 ?? [];
        $dynamicField2 = $request->dynamic_field2 ?? [];

        // Check if at least one of the transaction fields is filled
        if (!empty($netweights) || !empty($tareweights) || !empty($grossweights) || !empty($containerNos) || !empty($dynamicField1) || !empty($dynamicField2)) {
            foreach ($netweights as $id => $netweight) {
                ReprintTransaction::create([
                    'reprint_header_id' => $reprintHeaderId->id,
                    'transaction_id' => $request->transaction_id,
                    'net_weight' => $netweight,
                    'tare_weight' => $tareweights[$id] ?? null,
                    'gross_weight' => $grossweights[$id] ?? null,
                    'container_no' => $containerNos[$id] ?? null,
                    'dynamic_field1' => $dynamicField1[$id] ?? null,
                    'dynamic_field2' => $dynamicField2[$id] ?? null,
                    'created_by' => auth::user()->id,
                    'unit_id' => auth::user()->unit_id,
                ]);
            }
        } else {
            ReprintTransaction::create([
                'reprint_header_id' => $reprintHeaderId->id,
            ]);
        }


        $config_data = configuration::orderby('id','desc')->first();
        // dd($config_data);
        // if($config_data->print_preview == 'on'){
        //     $idsegment = LabelDesign::where('label_name',$request->segment(2))->first();
        // }else{
            $idsegment = LabelDesign::where('id',$request->segment(2))->first();
        // dd($idsegment);
          $labelNameId = LabelDesign::where('id',$idsegment->id)->first();
        //   dd($labelNameId);
          $labelID = LabelDesign::where('id',$labelNameId->id)->first();
        //   dd($labelID->label_name);

          $config_data = configuration::orderby('id','desc')->first();
          $shipper_print = LabelDesign::where('label_name',$labelID->label_name)->first();
        //   dd($shipper_print);
          $header=ReprintHeader::orderby('id','desc')->where('label_name',$shipper_print->id)->first();
        //   dd($header);
          $productNameID = productmaster::where('unit_id',auth::user()->unit_id)->where('id',$header->product_name)->first();
        //   dd($productNameID);
          $productData =productmaster::where('unit_id',auth::user()->unit_id)->where('product_name',$productNameID->product_name)->first();
          // dd($productData,$productNameID);
          $data1=ReprintTransaction::where('unit_id',auth::user()->unit_id)->where('reprint_header_id',$header->id)->get();
        //   dd($data1);
          $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();

        return view('predefined-reprint.reprint-print',compact('shipper_print','lines','config_data','data1','header','productData','productNameID'));
    }


}
