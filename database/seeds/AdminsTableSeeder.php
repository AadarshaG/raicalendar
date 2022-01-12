<?php

use Illuminate\Database\Seeder;
use DB as DBS;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                'name'=>'Admin',
                'email'=>'web@raicalendar.com',
                'password'=>Hash::make('admin002'),
                'role'=>'admin',
            )
        );
        DBS::table('admins')->insert($users);
    }
}
