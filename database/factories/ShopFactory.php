<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Shop;
use App\Libraries\RandJP;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genre= $this->faker->numberBetween(1, 12);
        // $genre = rand(1, 12);
        switch ($genre) {
            case 1:
                $url = 'image/italian.jpg';
                break;
            case 2:
                $url = 'image/izakaya.jpg';
                break;
            case 3:
                $url = 'image/ramen.jpg';
                break;
            case 4:
                $url = 'image/sushi.jpg';
                break;
            case 5:
                $url = 'image/yakiniku.jpg';
                break;
            case 6:
                $url = 'image/cyuuka.jpg';
                break;
            case 7:
                $url = 'image/kissaten.jpg';
                break;
            case 8:
                $url = 'image/familyrestaurant.png';
                break;
            case 9:
                $url = 'image/coffee.jpg';
                break;
            case 10:
                $url = 'image/curry.jpg';
                break;
            case 11:
                $url = 'image/teisyoku.jpeg';
                break;
            case 12:
                $url = 'image/soba.jpg';
                break;
        }
        $name=new RandJP;
        return [
            // 'name' => preg_replace("/[、。「」　]/u", "", $this->faker->realText(10, 5)),
            'name' => $name->rand_hiragana(5),
            'area_id' => $this->faker->numberBetween(1, 100),
            'genre_id' => $genre,
            'summary' => $this->faker->realText(200,5),
            'image_url' => $url,
            'likes_count' => $this->faker->numberBetween(0, 500),
        ];
    }
}