<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	[
            'name'=>'lehoanh',
            'email'=>'lehoanhtro@gmail.com',
            'password'=>bcrypt('123456'),
            'level'=>1

        ],
        [
            'name'=>'admin',
            'email'=>'admin@gamil.com',
            'password'=>bcrypt('123456'),
            'level'=>1

        ],
    ];
        DB::table('vp_users')->insert($data);
        
    }
}
