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

        $query=Shop::query();
        //地域が選択されている場合
        if(isset($area)) {
            $query=$query->where('area_id',$area);
        }
        //ジャンルが選択されている場合
        if(isset($genre)) {
            $query=$query->where('genre_id',$genre);
        }
        //キーワードが入力されている場合
        if(isset($keywords)) {
            $query=$query->where('name','LIKE',"%{$keywords}%");
        }
        $items=$query->orderBy('area_id')->orderBy('genre_id')->get();
        return $items;

    }
}
