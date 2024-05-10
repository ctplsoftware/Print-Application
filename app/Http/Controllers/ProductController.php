<?php

namespace App\Http\Controllers;
use App\Exports\productupload;
use App\Models\configuration;
use App\Models\productmaster;
use App\Models\User;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $config = configuration::orderby('id', 'desc')->first();
        // dd($config);
        return view('product.create', compact('config'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $config = configuration::orderby('id', 'desc')->first();
        $productName = $request->product_name;
        $trimmedProductName = strtolower(preg_replace('/\s+/', ' ', $productName));
        // dd($trimmedProductName);
        $existingProducts = productmaster::where('product_id', $request->product_id)
            ->get();
        // dd($existingProducts);
        foreach ($existingProducts as $existingProduct) {
            $existingTrimmedName = strtolower(preg_replace('/\s+/', ' ', $existingProduct->product_name));
            if ($trimmedProductName == $existingTrimmedName) {
                // dd('true');
                return redirect()->route('productmaster.create')->with('msg', 'Product with the same name and a different ID already exists');
            }
        }
        // dd('p');
        // for product master image upoad
        // if ($request->product_image1 == null) {
        //     // dd('iff');
        //     $product_image1 = 'null';
        // } else {
        //     // dd('else');
        //     $product_image1 = $request->file('product_image1')->store('productimage', 'public');
        // }
        // if ($request->product_image2 == null) {
        //     // dd('iff');
        //     $product_image2 = 'null';
        // } else {
        //     $product_image2 = $request->file('product_image2')->store('productimage', 'public');
        // }

        //insert data
        if($config->product_approval_flow == 'on')
        {

            $existingProducts = productmaster::where('product_id', $request->product_id)
            ->get();
        //dd($existingProducts);
        foreach ($existingProducts as $existingProduct) {
            $existingTrimmedName = strtolower(preg_replace('/\s+/', ' ', $existingProduct->product_name));
            if ($trimmedProductName == $existingTrimmedName) {
                // dd('true');
                return redirect()->route('productmaster.create')->with('msg', 'Product with the same name and a different ID already exists');
            }
        }
        productmaster::create([
            'product_name' => $request->product_name,
            'product_id' => $request->product_id,
            'serial' => $request->serial,
            'increment_decrement' => $request->increment_decrement,
            'static_field1' => $request->static_field1,
            'static_field2' => $request->static_field2,
            'static_field3' => $request->static_field3,
            'static_field4' => $request->static_field4,
            'static_field5' => $request->static_field5,
            'static_field6' => $request->static_field6,
            'static_field7' => $request->static_field7,
            'static_field8' => $request->static_field8,
            'static_field9' => $request->static_field9,
            'static_field10' => $request->static_field10,
            'global_field1' => $request->global_field1,
            'global_field2' => $request->global_field2,
            // 'product_image1' => $product_image1,
            // 'product_image2' => $product_image2,
            'comments' => $request->comments,
            'status' => $request->status,
            'request_approval_status' => 'Requested',
            'created_by' => auth::user()->id,

        ]);
    }
    else{
// dd('testtt');
        $existingProducts = productmaster::where('product_id', $request->product_id)
        ->get();
    // dd($existingProducts);
    foreach ($existingProducts as $existingProduct) {
        $existingTrimmedName = strtolower(preg_replace('/\s+/', ' ', $existingProduct->product_name));
        if ($trimmedProductName == $existingTrimmedName) {
            // dd('true');
            return redirect()->route('productmaster.create')->with('msg', 'Product with the same name and a different ID already exists');
        }
    }
        productmaster::create([
            'product_name' => $request->product_name,
            'product_id' => $request->product_id,
            'serial' => $request->serial,
            'increment_decrement' => $request->increment_decrement,
            'static_field1' => $request->static_field1,
            'static_field2' => $request->static_field2,
            'static_field3' => $request->static_field3,
            'static_field4' => $request->static_field4,
            'static_field5' => $request->static_field5,
            'static_field6' => $request->static_field6,
            'static_field7' => $request->static_field7,
            'static_field8' => $request->static_field8,
            'static_field9' => $request->static_field9,
            'static_field10' => $request->static_field10,
            'global_field1' => $request->global_field1,
            'global_field2' => $request->global_field2,
            // 'product_image1' => $product_image1,
            // 'product_image2' => $product_image2,
            'comments' => $request->comments,
            'status' => $request->status,
            'request_approval_status' => 'Approved',
            'created_by' => auth::user()->id,

        ]);
    }
    if($config->product_approval_flow == 'on')
        {
        return redirect('/productmaster/show')->with('success', 'Product sends approval.');
        }
        else
        {
        return redirect('/productmaster/show')->with('success', 'Product created successfully.');

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        //   dd('ertyuio');
        $config = configuration::orderby('id', 'desc')->first();
        // dd($config->product_approval_flow);
        $product_detail = productmaster::orderby('id', 'desc')->get();
        // dd($product_detail);
        $productPermission['create'] = Auth::user()->checkPermission(['product_create']);
        // dd($productPermission);
        // return view('product.index', compact('product_detail', 'productPermission', 'config'))->with('message', 'Product created successfully');

        $config = configuration::orderby('id', 'desc')->first();
        //dd($config);
        $waitingCount = productmaster::where('request_approval_status', 'Requested')->count();
        $approvedCount = productmaster::where('request_approval_status', 'Approved')->count();
        $rejectedCount = productmaster::where('request_approval_status', 'Rejected')->count();
        //dd($waitingCount,$approvedCount,$rejectedCount);
        $productRequest = productmaster::orderby('id', 'desc')->where('request_approval_status', 'Requested')->get();
        //dd($productRequest);
        $productApprove = productmaster::orderby('id', 'desc')->where('request_approval_status', 'Approved')->get();
        // dd($productApprove);
        $productReject = productmaster::orderby('id', 'desc')->where('request_approval_status', 'Rejected')->get();
        // dd($productReject);

        return view('product.requestapproval', compact('config', 'productRequest', 'productApprove', 'productReject', 'waitingCount', 'approvedCount', 'rejectedCount', 'productPermission', 'product_detail'))->with('message','Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $config = configuration::orderby('id', 'desc')->first();
        $product_edit = productmaster::find($id);
        // dd($product_edit);

        $productPermission['edit'] = Auth::user()->checkPermission(['product_edit']);
        return view('product.edit', compact('product_edit', 'productPermission', 'config'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

            // dd($request->all());
        $config = configuration::orderby('id', 'desc')->first();
        $productName = $request->product_name;
        $trimmedProductName = strtolower(preg_replace('/\s+/', ' ', $productName));
        // dd($trimmedProductName);
        $existingProducts = productmaster::where('product_id', $request->product_id)
            ->get();
        // dd($existingProducts);
        foreach ($existingProducts as $existingProduct) {
        if ($request->product_name != $existingProduct->product_name) {
            // Check if any record with the same product name and a different product ID exists
            $productExists = productmaster::where('id', '!=', $id)
                ->where('product_name', $request->product_name)
                ->exists();

            if ($productExists) {
                return redirect()->back()->with('msg', 'Product with the same name and a different ID already exists');
            }
        }
    }
        // foreach ($existingProducts as $existingProduct) {
        //     $existingTrimmedName = strtolower(preg_replace('/\s+/', ' ', $existingProduct->product_name));
        //     if ($trimmedProductName == $existingTrimmedName) {
        //         // dd('true');
        //         return redirect()->back()->with('msg', 'Product with the same name and a different ID already exists');
        //     }
        // }
        // dd($request->product_image1,$request->product_image2);
        // if ($request->product_image1 == null) {
        //     // dd('iff');
        //     $product_image1 = 'null';
        // } else {
        //     // dd($request->file('product_image1'));
        //     $product_image1 = $request->file('product_image1')->store('productimage', 'public');
        // }
        // if ($request->product_image2 == null) {
        //     // dd('iff');
        //     $product_image2 = 'null';
        // } else {
        //     $product_image2 = $request->file('product_image2')->store('productimage', 'public');
        // }

        // if ($request->hasFile('product_image1')) {
        //     // dd('if image1');
        //     $product_image1 = $request->file('product_image1')->store('productimage', 'public');
        // } elseif ($request->product_image1 == null) {
        //     // dd('elseif image1');
        //     $product_image1 = 'null';
        // } else {
        //     // dd('else image1');
        //     $product_image1 = $request->product_image1;
        // }

        // if ($request->hasFile('product_image2')) {
        //     // dd('if image2');
        //     $product_image2 = $request->file('product_image2')->store('productimage', 'public');
        // } elseif ($request->product_image2 == null) {
        //     // dd('elseif image2');
        //     $product_image2 = 'null';
        // } else {
        //     // dd('else image2');
        //     $product_image2 = $request->product_image2;
        // }

        productmaster::where('id', $request->id)->update([
            'product_name' => $request->product_name,
            'product_id' => $request->product_id,
            'serial' => $request->serial,
            'increment_decrement' => $request->increment_decrement,
            'static_field1' => $request->static_field1,
            'static_field2' => $request->static_field2,
            'static_field3' => $request->static_field3,
            'static_field4' => $request->static_field4,
            'static_field5' => $request->static_field5,
            'static_field6' => $request->static_field6,
            'static_field7' => $request->static_field7,
            'static_field8' => $request->static_field8,
            'static_field9' => $request->static_field9,
            'static_field10' => $request->static_field10,
            'global_field1' => $request->global_field1,
            'global_field2' => $request->global_field2,

            'comments' => $request->comments,
            'status' => $request->status,
            'created_by' => auth::user()->id,
            'updated_by' => auth::user()->id,
        ]);

        if($config->product_approval_flow == 'on')
        {
        return redirect('/productmaster/show')->with('success', 'Product sends approval.');
        }
        else
        {
        return redirect('/productmaster/show')->with('success', 'Product updated successfully.');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function productnamechange(Request $request)
    // {
    //     $productName = $request->productName;
    //     $productList = productmaster::select('product_name')->get();
    //     foreach ($productList as $existName) {
    //         if (str_replace(" ", "", strtoupper($existName->product_name)) == str_replace(" ", "", strtoupper($productName))) {
    //             // dd('invalid name');
    //             $message = $existName ? 'Product Name already exists' : 'Product Name is available';
    //             return response()->json(['exists' => $existName, 'message' => $message]);
    //         }
    //     }

    // }

//     public function productIdchange(Request $request)
// {
//     $productId = $request->productId;
//     $productName = $request->productName;

//     // Check if any record with the same product name and a different product ID exists
//     $productExists = productmaster::where('product_id',$productId)->where('product_name', $productName)
//     ->exists();
//     // dd($productExists);

//     if ($productExists  == true) {
//         // dd('trueeeeee');
//         $message = 'Product name with same ID already exists ';
//     } else {
//         // dd('false');
//         $message = '';
//     }

//     return response()->json(['exists' => $productExists, 'message' => $message]);
// }

    public function requestapproval(Request $request)
    {

        $config = configuration::orderby('id', 'desc')->first();
        // dd($config);
        $waitingCount = productmaster::where('request_approval_status', 'Requested')->count();
        $approvedCount = productmaster::where('request_approval_status', 'Approved')->count();
        $rejectedCount = productmaster::where('request_approval_status', 'Rejected')->count();
        //dd($waitingCount,$approvedCount,$rejectedCount);
        $productRequest = productmaster::orderby('id', 'desc')->where('request_approval_status', 'Requested')->get();
        // dd($productRequest);
        $productApprove = productmaster::orderby('id', 'desc')->where('request_approval_status', 'Approved')->get();
        $productReject = productmaster::orderby('id', 'desc')->where('request_approval_status', 'Rejected')->get();
        $productPermission['create'] = Auth::user()->checkPermission(['product_create']);
        return view('product.requestapproval', compact('config', 'productRequest', 'productApprove', 'productReject', 'waitingCount', 'approvedCount', 'rejectedCount', 'productPermission'));
    }

    public function approvereject(string $id)
    {
        // dd($id);
        $config = configuration::orderby('id', 'desc')->first();
        $product_edit = productmaster::find($id);
        // dd($product_edit->product_image2);
        $productPermission['Approve'] = Auth::user()->checkPermission(['product_approve']);
        return view('product.approvereject', compact('product_edit', 'productPermission', 'config', 'productPermission'));
    }

    public function productApprove(Request $request)
    {
        // dd(Auth::user()->id);
        // dd('test approve',$request->userPassword);
        //dd($request->all());
        $date = Carbon::now('Asia/Kolkata');
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->userPassword, $user->password) == false) {
            // dd('falseee');
            return redirect()->back()->with('msg', 'Invalid password!!')->with('swal', true);
        }
        productmaster::where('id', $request->id)->update([
            'request_approval_status' => 'Approved',
            'approval_rejection_comments' => $request->approval_rejection_comments,
            'approved_by' => Auth::user()->id,
            'approved_date' => $date,
        ]);
        return redirect('/requestapproval')->with('success', 'Product approved.');
    }

    public function productReject(Request $request)
    {
        // dd('test reject',$request->approval_rejection_comments);
        //dd($request->all());
        $date = Carbon::now('Asia/Kolkata');
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->userPassword, $user->password) == false) {
            // dd('falseee');
            return redirect()->back()->with('msg', 'Invalid password!!')->with('swal', true);
        }
        productmaster::where('id', $request->id)->update([
            'request_approval_status' => 'Rejected',
            'approval_rejection_comments' => $request->approval_rejection_comments,
            'approved_by' => Auth::user()->id,
            'approved_date' => $date,
        ]);
        return redirect('/requestapproval')->with('success', 'Product rejected.');;
    }

    public function rejectpending(string $id)
    {
        $config = configuration::orderby('id', 'desc')->first();
        $product_edit = productmaster::find($id);
        // dd($product_edit->product_image2);
        $productPermission['edit'] = Auth::user()->checkPermission(['product_edit']);
        return view('product.rejectpending', compact('product_edit', 'productPermission', 'config', 'productPermission'));
    }

    public function updaterejectpending(Request $request, string $id)
    {
        $config = configuration::orderby('id', 'desc')->first();
        // dd($request->all());
        if ($request->hasFile('product_image1')) {
            // dd('if image1');
            $product_image1 = $request->file('product_image1')->store('productimage', 'public');
        } elseif ($request->product_image1 == null) {
            // dd('elseif image1');
            $product_image1 = 'null';
        } else {
            // dd('else image1');
            $product_image1 = $request->product_image1;
        }

        if ($request->hasFile('product_image2')) {
            // dd('if image2');
            $product_image2 = $request->file('product_image2')->store('productimage', 'public');
        } elseif ($request->product_image2 == null) {
            // dd('elseif image2');
            $product_image2 = 'null';
        } else {
            // dd('else image2');
            $product_image2 = $request->product_image2;
        }

        productmaster::where('id', $request->id)->update([
            'product_name' => $request->product_name,
            'product_id' => $request->product_id,
            'static_field1' => $request->static_field1,
            'static_field2' => $request->static_field2,
            'static_field3' => $request->static_field3,
            'static_field4' => $request->static_field4,
            'static_field5' => $request->static_field5,
            'static_field6' => $request->static_field6,
            'static_field7' => $request->static_field7,
            'static_field8' => $request->static_field8,
            'static_field9' => $request->static_field9,
            'static_field10' => $request->static_field10,
            'global_field1' => $request->global_field1,
            'global_field2' => $request->global_field2,
            // 'product_image1' => $product_image1,
            // 'product_image2' => $product_image2,
            'comments' => $request->comments,
            'status' => $request->status,
            'request_approval_status' => 'Requested',
            'created_by' => auth::user()->id,
            'updated_by' => auth::user()->id,
        ]);
        if($config->product_approval_flow == 'on')
        {
        return redirect('/productmaster/show')->with('success', 'Product sends approval.');
        }
        else
        {
        return redirect('/productmaster/show')->with('success', 'Product updated successfully.');

        }


    }
    public function approved(Request $request, $id)
    {
        $config = configuration::orderby('id', 'desc')->first();
        $product_edit = productmaster::find($id);
        //dd($product_edit->product_image2);
        $productPermission['edit'] = Auth::user()->checkPermission(['product_edit']);
        return view('product.approved', compact('product_edit', 'productPermission', 'config'));

    }

    public function bulkupload(){

        $config_data = configuration::orderby('id', 'desc')->first();
        // dd($config_data);
        return view('bulkupload.productupload',compact('config_data'));
    }

    public function bulkuploadproduct(Request $request){
        // dd('testt');
        $tableName = 'configuration'; // Replace with the actual table name
        return Excel::download(new productupload($tableName), 'product.xlsx');
    }



    public function import(Request $request)
    {
        // dd('kajsvhd');




        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'required|mimes:xlsx|max:10240', // Adjust the max file size as needed
            ], [
                'file.mimes' => 'Only xlsx files are allowed.',
                'file.max' => 'File size must not exceed 10MB.',
            ]);
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('public', $fileName);
            $file = storage_path('app/' . $filePath);
        // Fetch configuration data
        $config_data = configuration::orderby('id', 'desc')->first();
        // dd($config_data);

        $excel = (new FastExcel)->import($file, function($line) use ($config_data){
        // dd($line);
        if($config_data->product_approval_flow === 'on'){
            $status = 'Requested';
        }else{
            $status = 'Approved';
        }


            $existingProduct = productmaster::where('product_id', $line[$config_data->product_id])->first();
       // dd($existingProduct);
     if ($existingProduct) {
    // Store a message in the session
    Session::flash('error', 'Product ID must be unique.');

    // Redirect back with the error message
    return redirect('/bulkupload')->with('errorMessage', 'Product ID must be unique!');
       }
            // dd($line);
            return productmaster::create([
                'product_name' => $line[$config_data->product_name] ?? null,
                'product_id' => $line[$config_data->product_id] ?? null,
                'comments' => $line[$config_data->comments] ?? null,
                'serial' => $line['serial'] ?? null,
                'increment_decrement' => $line['increment_decrement'] ?? null,
                'static_field1' => $line[$config_data->p_static_field1] ?? null,
                'static_field2' => $line[$config_data->p_static_field2] ?? null,
                'static_field3' => $line[$config_data->p_static_field3] ?? null,
                'static_field4' => $line[$config_data->p_static_field4] ?? null,
                'static_field5' => $line[$config_data->p_static_field5] ?? null,
                'static_field6' => $line[$config_data->p_static_field6] ?? null,
                'static_field7' => $line[$config_data->p_static_field7] ?? null,
                'static_field8' => $line[$config_data->p_static_field8] ?? null,
                'static_field9' => $line[$config_data->p_static_field9] ?? null,
                'static_field10' => $line[$config_data->p_static_field10] ?? null,
                'status'=>'Active',
                'request_approval_status'=> $status,
                'created_by' => auth::user()->id,
                'updated_by' => auth::user()->id,
            ]);


        });

        // Return a response or redirect
        return redirect('/bulkupload')->with('successMessage', 'Excel File was uploaded successfully!');
    }else{
        return redirect('/bulkupload')->with('errorMessage', 'No file uploaded!');
    }
    }









}

