<?php

namespace App\Http\Controllers;

use App\Models\configuration;
use App\Models\PredefinedHeader;
use App\Models\ReprintHeader;
use App\Models\PredefinedTransaction;
use App\Models\ReprintTransaction;
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
        // dd($config_data);

        $reportDetail = PredefinedHeader::where('predefined_header.unit_id',auth::user()->unit_id)->orderBy('predefined_header.id', 'desc')
        ->leftJoin('reprint_header as rph', 'predefined_header.id', '=' , 'rph.transaction_id') // Ensure the correct join condition
        ->join('product_master', 'predefined_header.product_name', '=', 'product_master.id')
        ->join('users', 'predefined_header.created_by', '=', 'users.id')
        ->select(
            'product_master.product_name', 'product_master.product_id', 'product_master.static_field1',
            'product_master.static_field2', 'product_master.static_field3', 'product_master.static_field4',
            'product_master.static_field5', 'product_master.static_field6', 'product_master.static_field7',
            'product_master.static_field8', 'product_master.static_field9', 'product_master.static_field10',
            'predefined_header.batch_number', 'predefined_header.no_of_container', 'predefined_header.b_field1',
            'predefined_header.date_of_manufacturing', 'predefined_header.b_field2', 'predefined_header.b_field3',
            'predefined_header.date_of_expiry', 'predefined_header.date_of_retest', 'predefined_header.b_field4',
            'predefined_header.b_field5', 'predefined_header.global_field1', 'predefined_header.global_field2',
            'predefined_header.created_by', 'predefined_header.created_at', 'predefined_header.id', 'users.username',
            DB::raw('COALESCE(SUM(rph.reprint_count), 0) as total_reprint_count')
        )
        ->groupBy(
            'product_master.product_name', 'product_master.product_id', 'product_master.static_field1',
            'product_master.static_field2', 'product_master.static_field3', 'product_master.static_field4',
            'product_master.static_field5', 'product_master.static_field6', 'product_master.static_field7',
            'product_master.static_field8', 'product_master.static_field9', 'product_master.static_field10',
            'predefined_header.batch_number', 'predefined_header.no_of_container', 'predefined_header.b_field1',
            'predefined_header.date_of_manufacturing', 'predefined_header.b_field2', 'predefined_header.b_field3',
            'predefined_header.date_of_expiry', 'predefined_header.date_of_retest', 'predefined_header.b_field4',
            'predefined_header.b_field5', 'predefined_header.global_field1', 'predefined_header.global_field2',
            'predefined_header.created_by', 'predefined_header.created_at', 'predefined_header.id', 'users.username'
        )
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
    ->where('dynamic_transaction.unit_id',auth::user()->unit_id )
    ->select('product_master.product_name','dynamic_transaction.id','dynamic_transaction.free_field1','dynamic_transaction.free_field2',
    'dynamic_transaction.free_field3','dynamic_transaction.free_field4','dynamic_transaction.free_field5','dynamic_transaction.free_field6','dynamic_transaction.free_field7','dynamic_transaction.free_field8','dynamic_transaction.free_field9','dynamic_transaction.printed_date','dynamic_transaction.printed_by','dynamic_transaction.no_of_label')
    ->get();
    // dd($dynamicreport);
    return view('report.dynamicreport',compact('dynamicreport','config_data'));
    }

    public function bulkdynamicreport()
    {
        $config_data = configuration::orderby('id', 'desc')->first();
        // dd($config_data);

        $dynamicreport = DynamicTransactionBulkUpload::with(['user'])->where('unit_id',auth::user()->unit_id )
        ->select('bulktransaction_id',
        DB::raw('MAX(Freefield1_value) as Freefield1_value'),
        DB::raw('MAX(Freefield2_value) as Freefield2_value'),
        DB::raw('MAX(Freefield3_value) as Freefield3_value'),
        DB::raw('MAX(Freefield4_value) as Freefield4_value'),
        DB::raw('MAX(Freefield5_value) as Freefield5_value'),
        DB::raw('MAX(Freefield6_value) as Freefield6_value'),
        DB::raw('MAX(Freefield7_value) as Freefield7_value'),
        DB::raw('MAX(Freefield8_value) as Freefield8_value'),
        DB::raw('MAX(Freefield9_value) as Freefield9_value'),
        DB::raw('MAX(no_of_copies) as no_of_copies'),
        DB::raw('MAX(created_by) as created_by'),
        DB::raw('MAX(created_at) as created_at'))
        ->groupBy('bulktransaction_id')
        ->get();

        return view('report.bulkdynamicreport',compact('dynamicreport','config_data'));
    }
    public function bulkdynamicdetailedreport(Request $request)
    {
        $config_data = configuration::orderby('id', 'desc')->first();
        // dd(auth::user()->unit_id);


                    $dynamicreport = DynamicTransactionBulkUpload::where('unit_id',auth::user()->unit_id )->where('bulktransaction_id',$request->segment(2))
        ->get();
        return view('report.bulkdynamicdetailedreport',compact('dynamicreport','config_data'));
    }
    public function detailedPredefinedReport(Request $request, $id) {
        $reprintData = ReprintHeader::where('transaction_id', $id)->orderBy('updated_at', 'desc')->first();

        if (!$reprintData) {
            $reprintData = PredefinedHeader::where('unit_id',auth::user()->unit_id)->where('id', $id)->first();


            $productName = productmaster::where('unit_id',auth::user()->unit_id )->where('id', $reprintData->product_name)->first();
            $product_data = productmaster::where('unit_id',auth::user()->unit_id )->where('product_name', $productName->product_name)->first();
            $list = PredefinedTransaction::where('unit_id',auth::user()->unit_id )->where('predefine_header_id', $reprintData->id)->get();
            $header = PredefinedHeader::where('unit_id',auth::user()->unit_id )->orderBy('id', 'desc')->first();
            $designlabel = LabelDesign::where('unit_id',auth::user()->unit_id )->where('id', $reprintData->label_name)->first();

            $reprint_listed = ReprintTransaction::where('unit_id',auth::user()->unit_id )->where('transaction_id', $reprintData->transaction_id)
                ->orderBy('created_at', 'desc')
                ->get();

            $newprintlist = [];
            foreach ($reprint_listed as $transaction) {
                $headerId = $transaction->reprint_header_id;
                if (!isset($newprintlist[$headerId])) {
                    $newprintlist[$headerId] = [];
                }
                $newprintlist[$headerId][] = $transaction;
            }

            $reprint_list = $newprintlist;
// dd($reprintData->label_name,'as');
            $labelProductName = LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id', $reprintData->label_name)
                ->join('product_type_master as ptm', 'label_design.product_type', '=', 'ptm.id')
                ->join('label_type_master as ltm', 'label_design.Label_type', '=', 'ltm.id')
                ->select('ptm.product_type', 'ltm.label_type_name')
                ->first();

            $url = 'Asgar';
            $qrCode = QrCode::size(300)->generate($url);
            $product = productmaster::all();
            $config = configuration::orderBy('id', 'desc')->first();

            return view('report.predefineddetailedreport', compact(
                'product', 'config', 'reprintData', 'product_data', 'list', 'header', 'designlabel', 'qrCode', 'labelProductName', 'reprint_list'
            ));
        } else {
            $productName = productmaster::where('unit_id',auth::user()->unit_id )->where('id', $reprintData->product_name)->first();
            $product_data = productmaster::where('unit_id',auth::user()->unit_id )->where('product_name', $productName->product_name)->first();
            $list = PredefinedTransaction::where('unit_id',auth::user()->unit_id )->where('predefine_header_id', $reprintData->transaction_id)->get();

            $reprint_listed = ReprintTransaction::where('unit_id',auth::user()->unit_id )->where('transaction_id', $reprintData->transaction_id)
                ->orderBy('created_at', 'desc')
                ->get();

            $newprintlist = [];
            foreach ($reprint_listed as $transaction) {
                $headerId = $transaction->reprint_header_id;
                if (!isset($newprintlist[$headerId])) {
                    $newprintlist[$headerId] = [];
                }
                $newprintlist[$headerId][] = $transaction;
            }

            $reprint_list = $newprintlist;
            $s_no = count($reprint_list);
            $header = PredefinedHeader::where('unit_id',auth::user()->unit_id )->orderBy('id', 'desc')->first();
            // dd($reprintData->label_name);
            $designlabel = LabelDesign::where('unit_id',auth::user()->unit_id )->where('id', $reprintData->label_name)->first();

            $labelProductName = LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id', $reprintData->label_name)
                ->join('product_type_master as ptm', 'label_design.product_type', '=', 'ptm.id')
                ->join('label_type_master as ltm', 'label_design.Label_type', '=', 'ltm.id')
                ->select('ptm.product_type', 'ltm.label_type_name')
                ->first();

            $url = 'Asgar';
            $qrCode = QrCode::size(300)->generate($url);
            $product = productmaster::all();
            $config = configuration::orderBy('id', 'desc')->first();

            return view('report.predefineddetailedreport', compact(
                'product', 'config', 'reprintData', 'product_data', 'list', 'header', 'designlabel', 'qrCode', 'labelProductName', 'reprint_list', 's_no'
            ));
        }
    }

    public function detailedDynamicReport(Request $request,$id){
        // dd($id);
        $reprintData= DynamicTransaction::where('unit_id',auth::user()->unit_id )->where('id',$id)->first();
        // dd($reprintData);
        $productName = productmaster::where('unit_id',auth::user()->unit_id )->where('id',$reprintData->product_name)->first();
        // dd($productName);
        $product_data=productmaster::where('unit_id',auth::user()->unit_id )->where('product_name',$productName->product_name)->first();
        // dd($product_data);
        // $list=PredefinedTransaction::where('predefine_header_id',$reprintData->id)->get();
        // dd($list);
        $header=DynamicTransaction::where('unit_id',auth::user()->unit_id )->orderby('id','desc')->first();
        // dd($header);
        $designlabel = LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id',$reprintData->label_name)->first();
        // dd($designlabel);
        $labelProductName = LabelDesign::where('label_design.unit_id',auth::user()->unit_id )->where('label_design.id', $reprintData->label_name)
       ->join('product_type_master as ptm', 'label_design.product_type', '=', 'ptm.id')
       ->join('label_type_master as ltm', 'label_design.Label_type', '=', 'ltm.id')
       ->select('ptm.product_type', 'ltm.label_type_name')
        ->first();
        // dd($labelProductName);
        $url = 'Asgar';
        $qrCode = QrCode::size(300)->generate($url);
        $product= productmaster::where('unit_id',auth::user()->unit_id)->get();
        $config=configuration::orderby('id','desc')->first();
        // dd($config);
        return view('report.dynamicdetailedreport',compact(
        'product','config','reprintData','product_data','header','designlabel','qrCode','labelProductName'));
    }

}
