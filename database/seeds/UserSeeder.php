<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        		'id_user'=>'1705015',
        		'name'=>'User Default',
        		'email'=>'user@user.com',
        		'password'=>bcrypt('user')
        	]);
    }
}
