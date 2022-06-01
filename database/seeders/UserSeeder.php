<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        $user = User::create([
            'lastName' => 'Vasilescu',
            'firstName' => 'Ion',
            'cnp' => '1234567891012',
            'dateBirth' => '2022',
            'email' => 'stud@gmail.com',
            'password' => Hash::make('12345')
        ]);

        $user->assignRole('user');

        $user = User::create([
            'lastName' => 'Vasile',
            'firstName' => 'In',
            'cnp' => '1234567891712',
            'dateBirth' => '2022',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'lastName' => 'V',
            'firstName' => 'I',
            'cnp' => '1234567891312',
            'dateBirth' => '2022',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('12345')
        ]);
        $user->assignRole('teacher');
    }
}
