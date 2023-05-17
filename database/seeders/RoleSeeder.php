<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Roles = array( 
            array( 
               'role' => 'Admin'   
            ), 
            array( 
                'role' => 'Wholesale'   
             ), 
             array(
                'role' => 'Retailer'
             ),
             array(
                'role' => 'User'
             )
             );
        
        $UserRole = array(
        array(
            'user_id' => '1', 
            'role_id' => '1'
        ),
        array(
            'user_id' => '2', 
             'role_id' => '2'
        )
        );

          
         DB::table('roles')->insert($Roles);
         DB::table('users_roles')->insert($UserRole);
    }
}
