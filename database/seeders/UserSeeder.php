<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'dni' => '41306304',
            'name' =>'Gustavo Dos Santos',
            'email' => 'simondossantos18@gmail.com',
            'password' => bcrypt('gustavo'),
        ]);

        User::factory(10)->create();
    }
}
