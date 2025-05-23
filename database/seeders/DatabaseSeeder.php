<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $check_user = User::where('email','admin@admin.com')->exists();
        if(!$check_user){
            $user = new User();
            $user->name = 'Test User';
            $user->email = 'admin@admin.com';
            $user->status = 1;
            $user->password = Hash::make('a12345678');
            $user->save();
        }
    }
}
