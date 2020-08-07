<?php

use Illuminate\Database\Seeder;

class AdminOPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('tb_AdmOP')->insert([
        		'id_user'=>'1705015',
        		'name'=>'admin',
        		'email'=>'admin@admin.com',
        		'password'=>bcrypt('admin'),
				'role'=>1
        	]);
		DB::table('tb_AdmOP')->insert([
        		'id_user'=>'1705015',
        		'name'=>'user',
        		'email'=>'user@user.com',
        		'password'=>bcrypt('user'),
				'role'=>2
        	]);
    }
}
