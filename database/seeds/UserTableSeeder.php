<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','admin')->first();
        $role_author = Role::where('name','author')->first();
        $role_user = Role::where('name','user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('1234'),
            'photo' => 'foto_perfil.jpg'
        ]);

        $admin->roles()->attach($role_admin);
        

        $author = User::create([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => bcrypt('1234'),
            'photo' => 'foto_perfil.jpg'
        ]);
        $author->roles()->attach($role_author);
    

        $user = User::create([
            'name' => 'Author',
            'email' => 'author@email.com',
            'password' => bcrypt('1234'),
            'photo' => 'foto_perfil.jpg'
        ]);
        $user->roles()->attach($role_author);
    }
}
