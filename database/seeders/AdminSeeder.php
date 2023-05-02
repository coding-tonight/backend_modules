<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $users = array(
        array(
          'username' => 'Administrator', 
          'password' => Hash::make('admin@123@') , 
           'is_admin' => '1' 
        ),
        array(
            'username' => 'User', 
            'password' => Hash::make('user@123@') , 
             'is_admin' => '0' 
        )
        );

  
       DB::table('users')->insert($users);
    }
}
