<?php

namespace App\Http\Controllers;

use App\Models\configuration;
use App\Models\PredefinedHeader;
use App\Models\PredefinedTransaction;
use App\Models\LabelDesign;
use App\Models\DynamicTransaction;
use App\Models\productmaster;
use App\Models\DynamicTransactionBulkUpload;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Auth;
use DB;
class ReportController extends Controller
{
    //
    public function index()
    {
        $config_data = configuration::orderby('id', 'desc')->first();
        //dd($config_data);
        $reportDetail = PredefinedHeader::orderBy('predefined_header.id', 'desc')
        ->join('product_master', 'predefined_header.product_name', '=', 'product_master.id')
        ->join('users','predefined_header.created_by','=','users.id')
        ->select('product_master.product_name','product_master.product_id','product_master.static_field1',
        'product_master.static_field2','product_master.static_field3','product_master.static_field4',
       'product_master.static_field5','product_master.static_field6','product_master.static_field7',
      'product_master.static_field8','product_master.static_field9','product_master.static_field10',
       'predefined_header.batch_number','predefined_header.no_of_container','predefined_header.b_field1',
       'predefined_header.date_of_manufacturing','predefined_header.b_field2','predefined_header.b_field3',
        'predefined_header.date_of_expiry','predefined_header.date_of_retest','predefined_header.b_field4',
        'predefined_header.b_field5','predefined_header.global_field1','predefined_header.global_field2','predefined_header.created_by',
        'predefined_header.created_at','predefined_header.id','users.username')
        ->get();
        // dd($reportDetail);
        $ReportPermission['view'] = Auth::user()->checkPermission(['report_view']);
        return view('report.index', compact('config_data','reportDetail','ReportPermission'));
    }

    public function dynamicreport()
    {
    $config_data = configuration::orderby('id', 'desc')->first();
    $dynamicreport = DynamicTransaction::orderBy('dynamic_transaction.id','desc')
    ->join('product_master', 'dynamic_transaction.product_name', '=', 'product_master.id')
    ->select('product_master.product_name','dynamic_transaction.id','dynamic_transaction.free_field1','dynamic_transaction.free_field2',
    'dynamic_transaction.free_field3','dynamic_transaction.free_field4','dynamic_transaction.free_field5','dynamic_transaction.free_field6')
    ->get();
    // dd($dynamicreport);
    return view('report.dynamicreport',compact('dynamicreport','config_data'));
    }

    public function bulkdynamicreport()
    {
        $config_data = configuration::orderby('id', 'desc')->first();
        // dd($config_data);

        $dynamicreport = DynamicTransactionBulkUpload::with(['user'])->select('bulktransaction_id',
        DB::raw('MAX(Freefield1_value) as Freefield1_value'),
        DB::raw('MAX(Freefield2_value) as Freefield2_value'),
        DB::raw('MAX(Freefield3_value) as Freefield3_value'),
        DB::raw('MAX(Freefield4_value) as Freefield4_value'),
        DB::raw('MAX(Freefield5_value) as Freefield5_value'),
        DB::raw('MAX(Freefield6_value) as Freefield6_value'),
        DB::raw('MAX(created_by) as created_by'),
        DB::raw('MAX(created_at) as created_at'))
        ->groupBy('bulktransaction_id')
        ->get();

        return view('report.bulkdynamicreport',compact('dynamicreport','config_data'));
    }
    public function bulkdynamicdetailedreport(Request $request)
    {
        $config_data = configuration::orderby('id', 'desc')->first();
        // dd($config_data);

        $dynamicreport = DynamicTransactionBulkUpload::where('bulktransaction_id',$request->segment(2))
        ->get();
        return view('report.bulkdynamicdetailedreport',compact('dynamicreport','config_data'));
    }
    public function detailedPredefinedReport(Request $request,$id){
        // dd($request->all());
        $reprintData= PredefinedHeader::where('id',$id)->first();
        // dd($reprintData);
        $productName = productmaster::where('id',$reprintData->product_name)->first();
        // dd($productName);
        $product_data=productmaster::where('product_name',$productName->product_name)->first();
        // dd($product_data);
        $list=PredefinedTransaction::where('predefine_header_id',$reprintData->id)->get();

        $header=PredefinedHeader::orderby('id','desc')->first();
        // dd($header);
        $designlabel = LabelDesign::where('label_design.id',$reprintData->label_name)->first();
        // dd($designlabel);
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
        return view('report.predefineddetailedreport',compact(
        'product','config','reprintData','product_data','list','header','designlabel','qrCode','labelProductName'));
    }
    public function detailedDynamicReport(Request $request,$id){
        // dd($id);
        $reprintData= DynamicTransaction::where('id',$id)->first();
        // dd($reprintData);
        $productName = productmaster::where('id',$reprintData->product_name)->first();
        // dd($productName);
        $product_data=productmaster::where('product_name',$productName->product_name)->first();
        // dd($product_data);
        // $list=PredefinedTransaction::where('predefine_header_id',$reprintData->id)->get();
        // dd($list);
        $header=DynamicTransaction::orderby('id','desc')->first();
        // dd($header);
        $designlabel = LabelDesign::where('label_design.id',$reprintData->label_name)->first();
        // dd($designlabel);
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
        return view('report.dynamicdetailedreport',compact(
        'product','config','reprintData','product_data','header','designlabel','qrCode','labelProductName'));
    }

}
