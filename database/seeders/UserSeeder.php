<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            'name' => 'Willy Harefa',
            'position' => 'Staf IT',
            'username' => 'willy.harefa',
            'password' => Hash::make('admin'),
            'phone' => '+62 822 9090 9090',
        ]);

        $user->assignRole('super_admin');
    }
}
