<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;

class ProductUpload implements FromCollection
{
    protected $tableName;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }

    public function collection()
    {
        // Get configuration for the given table
        $config = Configuration::orderBy('id','desc')->first();

        // Check if the configuration is available
        if (!$config) {
            return collect(); // Return an empty collection if no configuration is found
        }

        // Fetching the selected fields
        $selectedFields = $this->getSelectedFields($config);

        // Fetching data based on selected fields
        $data = DB::table($this->tableName)
            ->orderBy('id', 'desc')
            ->select($selectedFields)
            ->first();

        // Validate and insert data based on mandatory fields
        if (is_object($data)) {
            $rowData = [];
            foreach ($selectedFields as $field) {
                // Check if the property exists before accessing it
                if (property_exists($data, $field)) {
                    $rowData[$field] = $data->$field;
                }
            }

            // Validate and insert data here based on mandatory fields
            // You can use $rowData for inserting data into your Excel sheet
            // Example: Excel::create()->insert($rowData);
        }

        // Add headers to the collection
        $headers = $this->getHeaderRow($config, $selectedFields);
        $result = collect([$headers]);

        return $result;
    }

    protected function getSelectedFields($config)
    {
        $fields = [];

        // Always include default columns
        $fields[] = 'product_name';
        $fields[] = 'product_id';

        // Ensure "comments" is included only once
        if ($config->comments_use == 'on') {
            $fields[] = 'comments';
        }
        // if ($config->serialization == 'user-input' && $config->product == 'on') {
        //     $fields[] = 'serial';
        // }


        for ($i = 1; $i <= 10; $i++) {
            $fieldName = "p_static_field$i";
            $useFieldName = "p_field{$i}_use";
            if ($config->$useFieldName == 'on') {
                $fields[] = $fieldName;
            }
        }



        return $fields;
    }

    protected function getHeaderRow($config, $selectedFields)
    {
        $headers = [];

        // Always include default headers
        $headers[] = $config->product_name;
        $headers[] = $config->product_id;


        // Ensure "comments" is included only once
        if ($config->comments_use == 'on') {
            $headers[] = $config->comments;
        }
        if ($config->serialization == 'user-input' && $config->product == 'on') {
            $headers[] = 'serial';
        }
        if ($config->serialization == 'user-input' && $config->product == 'on') {
            $headers[] = 'increment_decrement';
        }


        foreach ($selectedFields as $field) {
            // Exclude default columns from being repeated in headers
            if ($field !== 'product_name' && $field !== 'product_id' && $field !== 'comments' && $field !== 'serial' && $field !== 'increment_decrement') {
                $headerName = $config->$field; // Use the configuration value as the header name
                $headers[] = $headerName;
            }
        }


        return $headers;
    }

}
