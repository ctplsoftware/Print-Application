<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;
use App\Models\organization_master;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Spatie\Activitylog\Models\Activity;



class organizationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:API Master', ['only' => ['insert', 'fetch','edit','save']]);
    // }
    public function index()
    {
        // dd('test');
        $var1 = DB::table('configuration')
        ->orderBy('id', 'desc')
        // ->select('gs1code', 'organization_name')
        ->first();

        // dd($var1);
        $var2 = DB::table('organization_master')
        ->select('id')
        ->orderBy('id', 'desc')
        ->first();



        return view('organization.create', compact('var1', 'var2' ));


    }
    public function insert(Request $req)
    {
        // dd($req->all());

        $validator = Validator::make($req->all(), [
            'manufacturer_import_license_no' => 'required|max:20|unique:organization_master,manufacturer_import_license_no',
            'address' => 'required|unique:organization_master,address',
            'company_name_on_label' => 'required|max:100',
            'manufacturing_location' => 'required|max:100',
        ], [
            'manufacturing_location.required' => 'The Manufacturing Location Name field is required.',
            'manufacturer_import_license_no.required' => 'The Manufacturer License Number field is required.',
            'company_name_on_label.required' => 'The Manufacturing Location Name (To be printed on the label) field is required.',
            'address.required' => 'The Address field is required.',

            'manufacturing_location.max' => 'Manufacturing Location Name must be less than 100 characters.',
            'manufacturer_import_license_no.max' => 'Manufacturer License Number must be less than 20 characters.',
            'company_name_on_label.max' => 'Manufacturing Location Name (To be printed on the label) must be less than 100 characters.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('mess', 'Validation Error: Please check your inputs.');
        }
        // $licence_no_validation=organization_master::pluck('manufacturer_import_license_no');

        // dd($req->manufacturer_import_license_no, $licence_no_validation);
        // if(count(($req->manufacturer_import_license_no==$licence_no_validation))>=1){
        //     return redirect()->back()->with('error','Manufacturing License Number already exists');

        // };
        //company name validation
        $location_name_validation=organization_master::pluck('location_name')->toArray();
        $location_name=($req->get('location_name').' | '.$req->get('manufacturing_location'));
       // Convert all array elements to lowercase for case-insensitive comparison
       $arrayLowercase = array_map('strtolower', $location_name_validation);

       // Convert the search value to lowercase
       $valueToFindLowercase = strtolower($location_name);

        $key = array_search($valueToFindLowercase, $arrayLowercase);
        if($key !== false){
            return redirect()->back()->with('errorMessage','Manufacturing location name already exists');
        };
         //company name validation
        //  $address_validation=organization_master::pluck('address')->toArray();
        //  $address=$req->get('address');
        //  // Convert all array elements to lowercase for case-insensitive comparison
        //  $addresslowercase = array_map('strtolower', $address_validation);
        //  $address_lowercase_without_space = array_map(function ($address) {
        //      return preg_replace('/\s+/', ' ', trim($address));
        //  }, $addresslowercase);
         // Convert the search value to lowercase
        //  $valueToFindLowercase = preg_replace('/\s+/', '', strtolower($address));

        //  $key = array_search($valueToFindLowercase, $address_lowercase_without_space);

        //  if($key !== false){
        //      return redirect()->back()->with('error','Address already exists');
        //  };


        // dd($manufacturer_import_license_no);
        organization_master::create([
            'location_name' => $req->get('location_name').' | '.$req->get('manufacturing_location'),
            'company_name_on_label' => $req->get('company_name_on_label'),
            'manufacturer_import_license_no' => serialize($req->get('manufacturer_import_license_no')),
            'address' => $req->get('address'),
            'Status' => "Active",
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,

        ]);


        // $cleanedString2 = str_replace("\r\n", '', $req->address);
        // // dd($cleanedString, strlen($cleanedString) >= 600);

        // if((strlen($cleanedString2))>=300){
        //     return redirect('/organization')->with('pop','Address must be less than 300 characters');
        // }


        return redirect('/organizationfetch')
        ->with('message', 'Organization Created Successfully');

    }
    public function fetch(Request $req)
    {


        $var = DB::table('organization_master')
        ->orderBy('id')
        ->get();

        $compa_name =  DB::table('organization_master')->where('id', Auth::user()->unit)->first();


            return view('organization.index', compact('compa_name', 'var'))
        ->with('i', (request()->input('page', 1) - 1) * 7+1);

    }

    public function edit(Request $req)
    {






        $var1 = DB::table('organization_master')
        // ->select('id', 'company_name','manufacturer_import_license_no','address','gs1_code', 'common_gs1code')
            ->where('id', $req->segment(2))
            // ->orwhere('company_name', $req->segment(2))
            ->first();
            // dd($var1);
            // dd(count(explode(' | ', $var1->company_name)));
            if(count(explode(' | ', $var1->location_name))==1){
                $location_name=$var1->location_name;
            }else{
                $location_name=explode(' | ', $var1->location_name)[1];
            }
            // dd($var1);

        $var2 = DB::table('configuration')
        ->orderBy('id', 'desc')
        // ->select('gs1code', 'organization_name')
        ->first();
        $status=['Active','Inactive'];
        return view('organization.edit', compact('var1', 'var2','status','location_name'));


    }

    public function save(Request $req)
    {
            // dd('sdfg');
        //08-02-23 by monisha
        //input backend validation
        $this->validate($req, [
            'location_name' => 'required|max:200',
            'manufacturer_import_license_no' => 'required|max:20',
            'address' => 'required',
            'company_name_on_label' => 'required|max:100',
            'manufacturing_location'=>'required|max:100',
            // 'gs1_code' => 'required|max:13|unique:organization_master,gs1_code',
        ],[
            'manufacturing_location.required' => 'The Manufacturing Location Name field is required.',
            'manufacturer_import_license_no.required' => 'The Manufacturer License Number field is required.',
            'company_name_on_label.required' => 'The Manufacturing Location Name (To be printed on the label ) field is required.',
            'address.required' => 'The Address field is required.',

            'manufacturing_location.max' => 'Manufacturing Location Name must be less than 100 characters.',
            'manufacturer_import_license_no.max' => 'Manufacturer License Number must be less than 20 characters.',
            'company_name_on_label.max' => 'Manufacturing Location Name (To be printed on the label ) must be less than 100 characters.',
            // 'address.max' => 'Address must be less than 300 characters.',
            // 'gs1_code.unique'=>'GLN Code has already been taken'
        ]);

        $licence_no_validation=organization_master::where('id','<>',(explode('/', url()->previous())[4]))
        ->where('status','Active')->pluck('manufacturer_import_license_no');
        // dd($licence_no_validation);


        // dd($req->manufacturer_import_license_no);
        // if(count(($req->manufacturer_import_license_no==$licence_no_validation))>=1){
        //     return redirect()->back()->with('error','Manufacturing License Number already exists');

        // };

          //company name validation
          $company_name_validation=organization_master::where('id','<>',(explode('/', url()->previous())[4]))
          ->where('Status','=','Active')
          ->pluck('location_name')
          ->toArray();
          $company_name=($req->get('location_name').' | '.$req->get('manufacturing_location'));


            // Convert all array elements to lowercase for case-insensitive comparison
            $arrayLowercase = array_map('strtolower', $company_name_validation);

            // Convert the search value to lowercase
            $valueToFindLowercase = strtolower($company_name);

          $key = array_search($valueToFindLowercase, $arrayLowercase);
          if($key !== false){
              return redirect()->back()->with('errorMessage','Manufacturing location name already exists');
          };


            //company name validation
            $address_validation=organization_master::where('id','<>',(explode('/', url()->previous())[4]))
            ->where('Status','=','Active')
            ->pluck('address')
            ->toArray();
            $address=$req->get('address');
            // Convert all array elements to lowercase for case-insensitive comparison
            $addresslowercase = array_map('strtolower', $address_validation);
            $address_lowercase_without_space = array_map(function ($address) {
                return preg_replace('/\s+/', ' ', trim($address));
            }, $addresslowercase);
            // Convert the search value to lowercase
            $valueToFindLowercase = preg_replace('/\s+/', '', strtolower($address));

            $key = array_search($valueToFindLowercase, $address_lowercase_without_space);

            if($key !== false){
                return redirect()->back()->with('errorMessage','Address already exists');
            };


            // dd( $gln_validation);


        // dd(count(explode('|',Auth::user()->organization_master->company_name)));



        // dd($req->get('manufacturer_import_license_no'));
        // dd($req->manufacturing_location!=trim($company_name),$req->Status=="Inactive");


                    organization_master::find($req->id)
                    // ->where('id')
                        ->update([

                            'location_name' => $req->get('location_name').' | '.$req->manufacturing_location,
                            'company_name_on_label' => $req->get('company_name_on_label'),
                            'manufacturer_import_license_no' => serialize($req->get('manufacturer_import_license_no')),
                            'address' => $req->get('address'),
                            'Status' => $req->Status,

                        ]);

                        $input=$req->all();
                        // dd($input);


                        if($input['Status']!=$input['originalstatus']){
                            if($input['Status']=='Inactive'){
                                return redirect('/organizationfetch')
                                ->with('update', 'Location inactivated successfully');
                            }else if($input['Status']=='Active'){
                                return redirect('/organizationfetch')
                                ->with('update', 'Location activated successfully');
                            }
                           }

                            $cleanedString2 = str_replace("\r\n", '', $req->address);
                            // dd($cleanedString, strlen($cleanedString) >= 600);

                            if((strlen($cleanedString2))>=300){
                                return redirect('organizationedit')->with('pop','Address must be less than 300 characters');
                            }
                            else{
                                return redirect('/organizationfetch')->with('update', 'Location updated successfully');
                            }
                    // return redirect('/organizationfetch');









    }

    public function glnvalidations(Request $request)
    {
        // dd(DB::table('api_master')->where('unique_product_code', $request->upic_1)->exists());
        if (DB::table('organization_master')->where('organization_master.gs1_code', $request->gln_1)->exists()) {
            return response()->json("exist");
        } else {
            return response()->json("null");
        }

    }

}


