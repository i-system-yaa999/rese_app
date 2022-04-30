<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // No.1
        $genre = new Genre([
            'name' => 'イタリアン',
        ]);
        $genre->save();

        // No.2
        $genre = new Genre([
            'name' => '居酒屋',
        ]);
        $genre->save();

        // No.3
        $genre = new Genre([
            'name' => 'ラーメン',
        ]);
        $genre->save();

        // No.4
        $genre = new Genre([
            'name' => '寿司',
        ]);
        $genre->save();

        // No.5
        $genre = new Genre([
            'name' => '焼肉',
        ]);
        $genre->save();

        // No.6
        $genre = new Genre([
            'name' => '中華',
        ]);
        $genre->save();

        // No.7
        $genre = new Genre([
            'name' => '喫茶店',
        ]);
        $genre->save();

        // No.8
        $genre = new Genre([
            'name' => 'ファミレス',
        ]);
        $genre->save();

        // No.9
        $genre = new Genre([
            'name' => 'コーヒー専門店',
        ]);
        $genre->save();

        // No.10
        $genre = new Genre([
            'name' => 'カレー専門店',
        ]);
        $genre->save();

        // No.11
        $genre = new Genre([
            'name' => '定食屋',
        ]);
        $genre->save();

        // No.12
        $genre = new Genre([
            'name' => 'そば屋',
        ]);
        $genre->save();
    }
}
