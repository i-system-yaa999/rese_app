<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'summary',
        'image_url',
        'likes_count',
    ];

    public function getShopData(){
        $data= [
            'id' => $this->id,
            'area' => Area::find($this->area_id)->name,
            'genre' => Genre::find($this->genre_id)->name,
            'summary' => $this->summary,
            'image_url' => $this->image_url,
            'likes_count' => $this->likes_count,
        ];
        return $data;
    }
    // public function getAreaName()
    // {
    //     $area = Area::find($this->area_id)->name;
    //     return $area;
    // }
    // public function getGenreName()
    // {
    //     $genre = Genre::find($this->genre_id)->name;
    //     return $genre;
    // }
    public function getLike()
    {
        $like = Like::where('user_id', Auth::user()->id)->where('shop_id', $this->id)->first();
        return $like;
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
