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
       User::create(
         ['name' => 'Tomás',
         'email' => 'tom@gmail.com',
         'password' => bcrypt('123456'),
         'admin' => true
       ]);

         User::create([
           'name' => 'Mónica Alejandra Lopez Dobell',
           'email' => 'aledobell@hotmail.com',
           'password' => bcrypt('tomlucgas'),
           'admin' => true
         ]);
     }
}
