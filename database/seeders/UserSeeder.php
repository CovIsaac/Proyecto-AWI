<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'Isaac',
            'lastname' => 'Covarrubias',
            'telephone' => '4443347594',
            'address' => 'Av. Coras 197',
            'email' => 'a11uts9056@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
