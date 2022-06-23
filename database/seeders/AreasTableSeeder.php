<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Area::factory()->count(50)->create();

        // No.1
        $area = new Area([
            'name' => '東京都',
        ]);
        $area->save();

        // No.2
        $area = new Area([
            'name' => '大阪府',
        ]);
        $area->save();

        // No.3
        $area = new Area([
            'name' => '福岡県',
        ]);
        $area->save();
    }
}
