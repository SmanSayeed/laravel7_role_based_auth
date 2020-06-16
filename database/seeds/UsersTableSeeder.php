<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Eloquent::unguard();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::disableForeignKeyConstraints();
        DB::table('role_user')->truncate();
        Schema::disableForeignKeyConstraints();
    

        $adminRole = Role::where('name','admin')->first();
        $authorRole = Role::where('name','author')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([

        		'name'=>'Admin User',
        		'email' => 'admin@admin.com',
        		'password' => Hash::make('adminadmin')
        	]);
        $author = User::create([

        		'name'=>'Author User',
        		'email' => 'author@author.com',
        		'password' => Hash::make('authorauthor')
        	]);
        $user = User::create([

        		'name'=>'Generic User',
        		'email' => 'user@user.com',
        		'password' => Hash::make('useruser')
        	]);

        $admin->roles()->attach($adminRole);

        $author->roles()->attach($authorRole); 

        $user->roles()->attach($userRole);


    // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
