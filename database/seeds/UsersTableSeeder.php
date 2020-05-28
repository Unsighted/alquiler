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
        User::create([
        	'name' => 'Esteban',
            'username' => 'unsighted',
            'email' => 'unsightedcode@gmail.com',
            'password' => bcrypt('unsighted'),
            'admin' => true
        ]);
    }
}
