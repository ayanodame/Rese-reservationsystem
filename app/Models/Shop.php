<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'summary',
        'open_time',
        'close_time',
        'image_url',
    ];
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }
    public static function searchShop($area,$genre,$keywords){
        $query=Shop::where('name','LIKE',"%{$keywords}%")->where('area_id','LIKE',"%{$area}%")->where('genre_id','LIKE',"%{$genre}%")->get();
        return $query;
    }
}
