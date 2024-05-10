<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynamicBulkUploadController extends Controller
{
    //
    public function dynamicBulkTransactionView(){
        return view('dynamictransaction.dynamicbulkuploadview');
    }

    public function createTableExcel(Request $request)
    {
        // dd($request->filedata);
        // Validate the uploaded file
        $request->validate([
            'filedata' => 'required|mimes:xlsx,xls',
        ]);
        // Get the uploaded file
        $file = $request->file('filedata');
        // dd($file);
    
        // Read the column headers from the Excel file
        $columnHeaders = $this->getColumnHeaders($file);
    
        // Generate a table name based on the file name
        $tableName = 'dynamic_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        // dd($tableName);
    
        // Create the table if it doesn't exist
        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, function (Blueprint $table) use ($columnHeaders) {
                $table->id();
    
                // Dynamically create columns based on the Excel headers
                foreach ($columnHeaders as $header) {
                    $table->string($header);
                }
    
                $table->timestamps();
            });
        }
    
        // Insert data into the dynamically created table
        $this->insertDataIntoTable($file, $tableName);
    
        return view('dynamictransaction.dynamicbulkuploadindex');
    }
    
    // Helper method to get column headers from Excel file
    private function getColumnHeaders($file)
    {
        $excelData = $this->readExcelFile($file);
        return array_keys($excelData[0]);
    }
    
    // Helper method to read Excel file and return data
    private function readExcelFile($file)
    {
        $filePath = $file->getRealPath();
    
        // Check if the file exists
        if (!file_exists($filePath)) {
            throw ValidationException::withMessages(['filedata' => 'The uploaded file does not exist.']);
        }
    
        // Use native PHP functions to read Excel data
        $data = [];
        $excelReader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $excel = $excelReader->load($filePath);
        $worksheet = $excel->getActiveSheet();
        
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
            $data[] = $rowData;
        }
    
        return $data;
    }
    
    // Helper method to insert data into dynamically created table
    private function insertDataIntoTable($file, $tableName)
    {
        $excelData = $this->readExcelFile($file);
    
        // Remove the header row
        array_shift($excelData);
    
        // Insert data into the dynamically created table
        foreach ($excelData as $row) {
            DB::table($tableName)->insert($row);
        }
    }
}
