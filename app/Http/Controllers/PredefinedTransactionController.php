<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\productmaster;
use App\Models\LabelType;
use App\Models\configuration;
use App\Models\PredefinedTransaction;
use App\Models\DynamicTransaction;
use App\Models\PredefinedHeader;
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
        $product= productmaster::orderBy('id','desc')->where('status','Active')
        ->where('request_approval_status', 'Approved')->get();

        $labelDesign = LabelDesign::orderby('id','desc')->where('status','Active')->where('request_status', 'Approved')
        ->where('label_type_dynamic_predefined','predefined')->get();
        // dd($labelDesign);

        $header = PredefinedHeader::orderBy('id','desc')->first();
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
            $productMasterID =  productmaster::where('product_name',$request->product_name)->select('id')->first();
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
                'prefix'=>$request->prefix,
                'suffix'=>$request->suffix,
                'serial_no'=>$request->serialno,
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
                'print_status'=>$request->print_status,
                'created_by' => auth::user()->id,
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
                    ]);
                }
            }
            else{
                PredefinedTransaction::create([
                    'predefine_header_id' => $predefinedHeaderId->id,
                ]);
            }
        }else {
            // dd('else');
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
        // dd($request->product_name);
        $product_data=productmaster::where('product_name',$request->product_name)->get();
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
        $list = PredefinedHeader::orderBy('predefined_header.id', 'desc')
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
        // dd($id);
        $reprintData= PredefinedHeader::where('id',$id)->first();
        // dd($reprintData);
        $productName = productmaster::where('id',$reprintData->product_name)->first();
        // dd($productName);
        $product_data=productmaster::where('product_name',$productName->product_name)->first();
        // dd($product_data);
        $list=PredefinedTransaction::where('predefine_header_id',$reprintData->id)->get();
        //monisha for reprint label work(17-11-23)
        $header=PredefinedHeader::orderby('id','desc')->first();
        // dd($header);
        $designlabel = LabelDesign::where('label_design.id',$reprintData->label_name)->first();
        // dd($designlabel);
        // $labelProductName = LabelDesign::where('label_name',$designlabel->labelName)
        // ->join('product_type_master','label_design.product_type','=','product_type_master.id')
        // ->join('label_type_master','label_design.Label_type','=','label_type_master.id')
        // ->select('product_type_master.product_type','label_type_master.label_type_name')
        // ->first();
        $labelProductName = LabelDesign::where('label_design.id', $reprintData->label_name)
       ->join('product_type_master as ptm', 'label_design.product_type', '=', 'ptm.id')
       ->join('label_type_master as ltm', 'label_design.Label_type', '=', 'ltm.id')
       ->select('ptm.product_type', 'ltm.label_type_name')
        ->first();
        // dd($labelProductName);
        $url = 'Asgar';
        $qrCode = QrCode::size(300)->generate($url);
        $product= productmaster::get();
        $config=configuration::orderby('id','desc')->first();
        // dd($config);
        return view('predefinedtransaction.reprint',compact(
        'product','config','reprintData','product_data','list','header','designlabel','qrCode','labelProductName'));
    }
    public function printpreview(Request $req,$id)
    {
        // dd('test');
        $segment = request()->segment(2);
        // dd($segment);
        $labelID = LabelDesign::where('id',$segment)->first();
        // dd($labelID->id);
        $config_data = configuration::orderby('id','desc')->first();
        // dd($config_data->no_of_container_use);
        $shipper_print = LabelDesign::where('id',$labelID->id)->first();
        // dd($shipper_print);
        $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();
        // dd($lines);
        $label_name = LabelDesign::where('id',$shipper_print->id)->first();
    // dd($label_name);
        $header=PredefinedHeader::where('label_name',$shipper_print->id)->orderby('id','desc')->first();
        // dd($header);
        $productNameID = productmaster::where('id',$header->product_name)->first();
        // dd($productNameID);
        $productData =productmaster::where('product_name',$productNameID->product_name)->first();
        // dd($productData);
        $data1=PredefinedTransaction::where('predefine_header_id',$header->id)->first();
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
          $header=PredefinedHeader::orderby('id','desc')->where('label_name',$shipper_print->id)->first();
        //   dd($header);
          $productNameID = productmaster::where('id',$header->product_name)->first();
        //   dd($productNameID);
          $productData =productmaster::where('product_name',$productNameID->product_name)->first();
          // dd($productData,$productNameID);
          $data1=PredefinedTransaction::where('predefine_header_id',$header->id)->get();
        //   dd($data1);
          $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();

        return view('predefinedtransaction.printlabel',compact('shipper_print','lines','config_data','data1','header','productData','productNameID'));
    }



    public function batchNumberValidation(Request $request){
        $config = configuration::orderBy('id', 'desc')->first();
        $batchNumberExists = PredefinedHeader::where('batch_number', $request->batchNumber)->exists();
        $message = $batchNumberExists ? "$config->batch_number already exists, are you sure you want to continue" : "$config->batch_number is available";
        return response()->json(['exists' => $batchNumberExists, 'message' => $message]);
    }

    public function dynamictransaction(Request $request)
    {
        //dd('testttt');
        $config = configuration::orderBy('id', 'desc')->first();
        $productName = productmaster::orderBy('id', 'desc')->where('status','Active')->where('request_approval_status', 'Approved')->get();
        // dd($productName);

        $labelName = LabelDesign::orderby('id','desc')->where('status','Active')->where('request_status', 'Approved')
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
            'printed_by'  => auth::user()->id,
        ]);
        $shipper_print = LabelDesign::where('label_design.id',$labelID->id)->first();
        // dd($shipper_print->id);

        $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();


        $header=DynamicTransaction::orderby('id','desc')->where('label_name',$shipper_print->id)->first();
        // dd($header);
        $labelstaticfield = LabelDesign::where('label_design.id',$header->label_name)
        ->join('product_type_master','label_design.product_type','=','product_type_master.id')
                              ->join('label_type_master','label_design.Label_type','=','label_type_master.id')
                              ->select('product_type_master.product_type','label_type_master.label_type_name','label_design.labelstaticfield1_input',
                              'label_design.labelstaticfield2_input','label_design.Freefield1_label_value','label_design.Freefield2_label_value',
                              'label_design.Freefield3_label_value','label_design.Freefield4_label_value',
                              'label_design.Freefield5_label_value','label_design.Freefield6_label_value', )
                              ->first();
                              // dd( $labelstaticfield);



        $productNameID = productmaster::where('id',$header->product_name)->first();
        // dd($productNameID);
        $productData =productmaster::where('product_name',$productNameID->product_name)->first();
        // dd($productData);

        $config_data = configuration::orderby('id','desc')->first();
        return view('dynamictransaction.printdynamic',compact('header','lines','productData','config_data','shipper_print','labelstaticfield'));
    }

    public function labelnameagainstdata(Request $request){
          //  dd($request->labelName);
          $labelProductName = LabelDesign::where('label_design.id',$request->labelName)
                              ->join('product_type_master','label_design.product_type','=','product_type_master.id')
                              ->join('label_type_master','label_design.Label_type','=','label_type_master.id')
                              ->select('product_type_master.product_type','label_type_master.label_type_name')
                              ->first();
                              // dd($labelProductName);
         $freefieldnames =LabelDesign::where('label_design.id',$request->labelName)
         ->select('Freefield1_label_value','Freefield2_label_value','Freefield3_label_value',
         'Freefield4_label_value','Freefield5_label_value','Freefield6_label_value')->first();
        //  dd($freefieldnames);
        return response()->json(['success' => [
            'labelProductName' => $labelProductName,
            'freefieldnames' => $freefieldnames
        ]]);
    }

    public function labelNameDynamic(Request $request){
    //    dd($request->labelName);
       $labelData = LabelDesign::where('label_design.id',$request->labelName)
       ->join('product_type_master','label_design.product_type','product_type_master.id')
       ->join('label_type_master','label_design.Label_type','label_type_master.id')
       ->select('product_type_master.product_type','label_type_master.label_type_name')
       ->first();
    //    dd($labelData);
       return response()->json(['success' => $labelData]);
    }

    public function reprint(Request $request){
        //   dd($request->all());
         $checkID = $request->checkId;
        // dd($checkID);
        $data1 = [];
        // Check if $checkID is an array (multiple IDs selected) or a single value
    if (is_array($checkID)) {
        foreach($checkID as $checkedId) {
            // dd($checkedId);
            $labelNameId = LabelDesign::where('id',$request->segment(2))->first();
            // dd($labelNameId->id);
              $labelID = LabelDesign::where('id',$labelNameId->id)->first();
            // dd($labelID);
              $config_data = configuration::orderby('id','desc')->first();
              $shipper_print = LabelDesign::where('label_name',$labelID->label_name)->first();
            // dd($shipper_print);
            $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();

              $header=PredefinedHeader::orderby('id','desc')->where('label_name',$shipper_print->id)->first();
            // dd($header);
            $serialNo=PredefinedHeader::orderby('id','desc')->where('id', $request->transaction_id)->first();

              $productNameID = productmaster::where('id',$header->product_name)->first();
              $productData =productmaster::where('product_name',$productNameID->product_name)->first();
            //   dd($header->id);
              $data1 = PredefinedTransaction::where('predefine_header_id', $header->id)
            ->where('id', $checkedId)
            ->get();
            //   dd($data1);

        }
    } else {
        // dd("else");
        $labelNameId = LabelDesign::where('id',$request->segment(2))->first();
        // dd($labelNameId->id);
          $labelID = LabelDesign::where('id',$labelNameId->id)->first();
        // dd($labelID->label_name);
          $config_data = configuration::orderby('id','desc')->first();
          $shipper_print = LabelDesign::where('label_name',$labelID->label_name)->first();
        // dd($shipper_print->id);
        // dd($request->label_id);
        $lines = DB::table("line_circle_box")->where("label_id", $shipper_print->id)->get();
        // dd($lines);
        $header=PredefinedHeader::orderby('id','desc')->where('label_name',$shipper_print->id)->first();
        // dd($header);

        $serialNo=PredefinedHeader::orderby('id','desc')->where('id', $request->transaction_id)->first();
        // dd($serialNo);
          $productNameID = productmaster::where('id',$header->product_name)->first();
          $productData =productmaster::where('product_name',$productNameID->product_name)->first();
          $data1=PredefinedTransaction::where('predefine_header_id',$header->id)->get();
    }


        //   dd($data1);

        return view('predefinedtransaction.print',compact('shipper_print','lines','config_data','data1','header','productData','serialNo'));
    }

    public function reprintTransactionPredefined(Request $request){
        //    dd($request->all());
           $reprintData= PredefinedHeader::where('id',$id)->first();
        //    dd($reprintData);
           $productName = productmaster::where('id',$reprintData->product_name)->first();
        //    dd($productName);
           $product_data=productmaster::where('product_name',$productName->product_name)->first();
           // dd($product_data);
           $list=PredefinedTransaction::where('predefine_header_id',$reprintData->id)->get();
           //monisha for reprint label work(17-11-23)
           $header=PredefinedHeader::orderby('id','desc')->first();
           //dd($header);
           $designlabel = LabelDesign::where('label_name',$reprintData->label_name)->first();
           // dd($designlabel);
           // $labelProductName = LabelDesign::where('label_name',$designlabel->labelName)
           // ->join('product_type_master','label_design.product_type','=','product_type_master.id')
           // ->join('label_type_master','label_design.Label_type','=','label_type_master.id')
           // ->select('product_type_master.product_type','label_type_master.label_type_name')
           // ->first();
           $labelProductName = LabelDesign::where('label_name', $reprintData->label_name)
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
        ->select('product_master.product_name', 'dynamic_transaction.no_of_label', 'dynamic_transaction.created_at','dynamic_transaction.printed_by')
        ->get();
        //dd($dynamicData);
        return view('dynamictransaction.show',compact('dynamicData'));
    }


}
