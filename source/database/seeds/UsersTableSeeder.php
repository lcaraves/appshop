<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
        	'name'	=>	'Luis Arturo Caraves',
        	'email'	=>	'luisarturocaraves@hotmail.com',
        	'password'	=>	bcrypt('a123456.'),
            'admin'  =>  true,
        ]);
    }
}
