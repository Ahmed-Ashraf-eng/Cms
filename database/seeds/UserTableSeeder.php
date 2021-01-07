<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email' , 'a.sherif7@yahoo.com')->first();
        if(!$user) {
            User::create([
                'name' => 'Ahmed sherif',
                'email' => 'a.sherif7@yahoo.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'verified' => '1',
                'verification_token' => 'Admin Verified'
            ]);
        }
    }
}
