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
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
            'photo' => 'foto_perfil.jpg'
        ]);

        $author = User::create([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => bcrypt('1234'),
            'role' => 'user',
            'photo' => 'foto_perfil.jpg'
        ]);

        $user = User::create([
            'name' => 'Author',
            'email' => 'author@email.com',
            'password' => bcrypt('1234'),
            'role' => 'author',
            'photo' => 'foto_perfil.jpg'
        ]);

        factory(App\User::class,50)->create();
    }
}
