<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'notadmin',
            'email' => 'notadmin@mail.com',
            'password' => Hash::make('12345678'),
            'gender' => 'male',
            'date_of_birth' => '2015-06-16',
            'country' => 'megalovania'
        ]);

        User::firstOrCreate([
          'name' => 'admin',
          'email' => 'admin@mail.com',
          'password' => Hash::make('12345678'),
          'gender' => 'female',
          'date_of_birth' => '2013-06-16',
          'country' => 'kanva'
        ]);
    }
}
