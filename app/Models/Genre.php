<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function getGenreCount()
    {
        $genrecount = Shop::where('genre_id', $this->id)->get()->count();
        return $genrecount;
    }
}
