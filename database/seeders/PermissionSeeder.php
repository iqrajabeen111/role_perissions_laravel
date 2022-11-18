<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permissions =  [
            [
              'name' => 'create-post',
            
            ],
            [
              'name' => 'delete-post',
       
            ],
            [
              'name' => 'edit-post',
       
            ],
            [
              'name' => 'view-post',
       
            ],
            [
              'name' => 'delete-users',
       
            ],
            [
              'name' => 'create-users',
       
            ],
            [
              'name' => 'edit-users',
       
            ]
         
          ];

          Permission::insert($Permissions);
    }
}
