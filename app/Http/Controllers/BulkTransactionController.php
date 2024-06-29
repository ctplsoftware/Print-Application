<?php

namespace App\Http\Controllers;
use App\Models\configuration;
use Illuminate\Http\Request;
use App\Exports\TransactionBulkUplod;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\LabelDesign;
use App\Models\LabelType;
use Auth;
use App\Models\DynamicTransactionBulkUpload;



class BulkTransactionController extends Controller
{
    //
    Public function TransactionBulkuploadView(){
        // dd('ffyu');
        $config_data = configuration::orderby('id', 'desc')->first();
        return view('transactionbulkupload.create',compact('config_data'));
    }

    public function TransactionBulkUpload(Request $request){
        // dd('testt');
        $tableName = 'configuration'; // Replace with the actual table name
        // dd($tableName);
        return Excel::download(new TransactionBulkUplod($tableName), 'TransactionBulkUpload.xlsx');
    }

    public function dynamictransactionbulkupload(Request $request)
    {
        // dd('testttt');
        $config = configuration::orderBy('id', 'desc')->first();

        $labelName = LabelDesign::orderby('id','desc')->where('status','Active')->where('request_status', 'Approved')
        ->where('label_type_dynamic_predefined','dynamic')->get();
        // dd($labelName);

       return view('dynamictransaction.dynamicbulkuploadview',compact('labelName','config'));
    }
    public function bulkuploaddynamicsave(Request $request){
        // dd($request->all(),auth::user()->unit_id);
    if($request->printpreview=='printpreview'){
        $duplicate_copies=$request->duplicate_copies;
        // fetch label details
        $label_name = LabelDesign::where('label_design.id',$request->label_id)->first();
        // dd($label_name);

        $label_type = LabelType::where('id',$label_name->label_type)->pluck('label_type_name')->first();
        // dd($label_type);

        // get tranasction_id to increment for next transaction
        $transaction_id=DynamicTransactionBulkUpload::orderBy('id','desc')->pluck('bulktransaction_id')->first();
        // dd($transaction_id);
        // Insert as many checked data for dynamic transactions
        foreach ($request->checked_transaction as $key => $checked_transaction) {
            DynamicTransactionBulkUpload::create([
                    'label_name'  => $label_name->id,
                    'bulktransaction_id'=>$transaction_id+1,
                    'Freefield1_value' => $request->freefield1!=null?$request->freefield1.':'.$request->freefield_1[$key]:'',
                    'Freefield2_value' => $request->freefield2!=null?$request->freefield2.':'.$request->freefield_2[$key]:'',
                    'Freefield3_value' =>$request->freefield3!=null?$request->freefield3.':'.$request->freefield_3[$key]:'',
                    'Freefield4_value' => $request->freefield4!=null?$request->freefield4.':'.$request->freefield_4[$key]:'',
                    'Freefield5_value' => $request->freefield5!=null?$request->freefield5.':'.$request->freefield_5[$key]:'',
                    'Freefield6_value' =>$request->freefield6!=null?$request->freefield6.':'.$request->freefield_6[$key]:'',
                    'Freefield7_value' =>$request->freefield7!=null?$request->freefield7.':'.$request->freefield_7[$key]:'',
                    'Freefield8_value' =>$request->freefield8!=null?$request->freefield8.':'.$request->freefield_8[$key]:'',
                    'Freefield9_value' =>$request->freefield9!=null?$request->freefield9.':'.$request->freefield_9[$key]:'',
                    'no_of_copies' => $duplicate_copies,
                    'created_by'  => auth::user()->id,
                    'unit_id' => auth::user()->unit_id,
            ]);

            // fetch data to display in label
                $header=[
                'label_name'  => $label_name->id,
                'Freefield1_value' => $request->freefield1!=null?$request->freefield1.':'.$request->freefield_1[$key]:'',
                'Freefield2_value' => $request->freefield2!=null?$request->freefield2.':'.$request->freefield_2[$key]:'',
                'Freefield3_value' =>$request->freefield3!=null?$request->freefield3.':'.$request->freefield_3[$key]:'',
                'Freefield4_value' => $request->freefield4!=null?$request->freefield4.':'.$request->freefield_4[$key]:'',
                'Freefield5_value' => $request->freefield5!=null?$request->freefield5.':'.$request->freefield_5[$key]:'',
                'Freefield6_value' =>$request->freefield6!=null?$request->freefield6.':'.$request->freefield_6[$key]:'',
                'Freefield7_value' =>$request->freefield7!=null?$request->freefield7.':'.$request->freefield_7[$key]:'',
                'Freefield8_value' =>$request->freefield8!=null?$request->freefield8.':'.$request->freefield_8[$key]:'',
                'Freefield9_value' =>$request->freefield9!=null?$request->freefield9.':'.$request->freefield_9[$key]:'',

                'no_of_copies' => $duplicate_copies,
                ];
                // dd($header);

        }
        $bulktransaction_id=$transaction_id+1;
        $lines='';
       $shipper_print=$label_name;
       $labelstaticfield='';
    //    dd($shipper_print);
      // fetch data to display in label

      $config_data = configuration::orderby('id','desc')->first();

          return view('dynamictransaction.printpreview',compact('label_name','label_type','duplicate_copies','bulktransaction_id','shipper_print','header','config_data','lines'));
      }else{
          $bulktransaction_id=$request->segment(2);
          $header=DynamicTransactionBulkUpload::where('bulktransaction_id',$bulktransaction_id)->get();
          $duplicate_copies=$header[0]->no_of_copies;
          $label_name = LabelDesign::where('label_design.id',$request->segment(3))->first();
          $config_data = configuration::orderby('id','desc')->first();
          $lines='';
          $shipper_print=$label_name;
          $labelstaticfield='';

        return view('print.bulktransaction_dynamic',compact('header','duplicate_copies','label_name','config_data','lines','shipper_print','labelstaticfield'));

      }
      }

}
