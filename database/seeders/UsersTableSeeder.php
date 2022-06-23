<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Owner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = new User([
            'name' => 'てんぽだいひょう',
            'email' => 'owner@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'role' => '5',
        ]);
        $user->save();
        $owner = new Owner([
            'user_id' => 1,
            'shop_id' => 1,
        ]);
        $owner->save();

        User::factory(10)->create();
        
        $user = new User([
            'name' => 'かんりしゃ',
            'email' => 'admin@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'role' => '1',
        ]);
        $user->save();
    }
}
