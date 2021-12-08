<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::create([
    		'name' => 'Dược Thiện', 
    		'email' => 'duocthien@duocthien.com',
    		'password' => bcrypt('duocthien')
    	]);

    	$role = Role::create(['name' => 'Admin']);
    	
    	$permissions = Permission::pluck('id','id')->all();

    	$role->syncPermissions($permissions);

    	$user->assignRole([$role->id]);

    }
}
