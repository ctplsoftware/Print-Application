<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [

            
                "module_name" => 'Product',
                "permission_name" => 'Create',
                
            ],
            [

               
                "module_name" => 'Product',
                "permission_name" => 'Edit',
                
            ],
            [

              
                "module_name" => 'Product',
                "permission_name" => 'View',
               
            ],
            [

              
                "module_name" => 'Transaction',
                "permission_name" => 'View',
                
            ],
            [

               
                "module_name" => 'Transaction',
                "permission_name" => 'Create',
                
            ],
            [

             
                "module_name" => 'Transaction',
                "permission_name" => 'Reprint',
                
            ],
           
            [

           
                "module_name" => 'Configuration',
                "permission_name" => 'View',
                
            ],
            [

               
                "module_name" => 'Configuration',
                "permission_name" => 'Update',
                
            ],
            [

           
                "module_name" => 'Label',
                "permission_name" => 'Create',
                
            ],
            [

              
                "module_name" => 'Label',
                "permission_name" => 'View',
                
            ],
            [

            
                "module_name" => 'User',
                "permission_name" => 'Create',
                
            ],
            [

              
                "module_name" => 'User',
                "permission_name" => 'Edit',
                
            ],
            [

              
                "module_name" => 'User',
                "permission_name" => 'View',
                
            ],
            [

        
                "module_name" => 'Role',
                "permission_name" => 'View',
                
            ],
            [

             
                "module_name" => 'Role',
                "permission_name" => 'Create',
                
            ],
            [

             
                "module_name" => 'Role',
                "permission_name" => 'Edit',
                
            ],
            [

            
                "module_name" => 'Product',
                "permission_name" => 'Approve',
                
            ],
            [

           
                "module_name" => 'Label',
                "permission_name" => 'Approve',
                
            ],
            [

            
                "module_name" => 'Label',
                "permission_name" => 'Edit',
                
            ],

            [

              
                "module_name" => 'Report',
                "permission_name" => 'View',
                
            ],
        ];
        Permission::insert($data);
    }
}
