<?php

namespace App\Imports;

use App\Models\productmaster;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Validator;

class ProductImport implements ToModel, WithHeadingRow
{
    // Property to store imported data
    private $importedData = [];

    public function model(array $row)
    {
        // dd("hey");
        // Validate the data
        $validator = $this->validateRow($row);
    //    dd( $validator);

    // dd($row);

        // Example of redirecting back on validation failure
if ($validator->fails()) {
    return redirect()->back()->withErrors($validator);
}


        // Create a new ProductMaster model

         productmaster::create([
            'product_name' => $row['Product Name'],
            'product_id' => $row['Product ID'],
            'comments' => $row['Comments'],
            'static_field1' => $row['S Test1'],
            'static_field2' => $row['S Test2'],
            'static_field3' => $row['S Test3'],
            'static_field4' => $row['S Test4'],
            'static_field5' => $row['S Test5'],
            'static_field6' => $row['S Test6'],
            'static_field7' => $row['S Test7'],
            'static_field8' => $row['S Test8'],
            'static_field9' => $row['S Test9'],
            'static_field10' => $row['S Test10'],
        ]);        
        // $product->save();
        
        // Add the product to the imported data array
        $this->importedData[] = $product;

        return $product;
    }

    protected function validateRow(array $row)
    {
        // Define the validation rules
        $rules = [
            'product_name' => 'required',
            'product_id' => 'required|unique:productmasters,product_id',
            'comments' => 'required',
            's_test1' => 'required',
            's_test2' => 'required',
            's_test3' => 'required',
            's_test4' => 'required',
            's_test5' => 'required',
            's_test6' => 'required',
            's_test7' => 'required',
            's_test8' => 'required',
            's_test9' => 'required',
            's_test10' => 'required',      
        ];
// dd( $rules);
        // Run the validation
        return Validator::make($row, $rules);
    }

    // Getter method to access the imported data
    public function getImportedData()
    {
        return $this->importedData;
    }
}
