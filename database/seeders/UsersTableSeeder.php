<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Owner;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Reserve;
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
        // 通常ユーザー 1件
        $user = new User([
            'name' => 'つうじょうゆーざー',
            'email' => 'user@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'role' => '10',
        ]);
        $user->save();
        // 通常ユーザー予約情報 1件
        $reserve = new Reserve([
            'user_id' => 1,
            'shop_id' => 19,
            'reserved_at' => now(),
            'number' => 3,
        ]);
        $reserve->save();
        // 通常ユーザー評価コメント 1件
        $comment = new Comment([
            'user_id' => 1,
            'shop_id' => 18,
            'evaluation' => 4,
            'comment' => 'お店の雰囲気も良くて、お肉も新鮮でおいしかったです。',
        ]);
        $comment->save();
        // 通常ユーザーお気に入り 1件
        $like = new Like([
            'user_id'=> 1,
            'shop_id'=> 18,
        ]);
        $like->save();

        // 店舗代表者 1件
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
            'user_id' => 2,
            'shop_id' => 1,
        ]);
        $owner->save();

        // ダミーユーザー 10件
        User::factory(10)->create();
        
        // システム管理者 1件
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
