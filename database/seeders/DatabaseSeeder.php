<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin =  User::create([
            'name'=>'محمد نصار ',
            'password'=>Hash::make('111'),
            'email'=>"mohammed@mdm.com",
        ]);
    }
}