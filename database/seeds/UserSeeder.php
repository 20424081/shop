<?php

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
        //
        $user           = new User;
        $user->name     = 'Le Van Trong';
        $user->email    = 'tronglevan98@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user->assignRole('Super Admin');
    }
}
