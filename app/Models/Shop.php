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
        //全部入力されている場合
        if($area and $genre and $keywords!==null){
            $query=Shop::where('name','LIKE',"%{$keywords}%")->where('area_id',$area)->where('genre_id',$genre)->get();
            return $query;
        }
        //地域とジャンルが選択されている場合
        if($area and $genre!==null){
            $query=Shop::where('area_id',$area)->where('genre_id',$genre)->get();
            return $query;
        }
        //キーワードのみ入力されている場合
        if($keywords!==null){
            $query=Shop::where('name','LIKE',"%{$keywords}%")->get();
            return $query;
        }
        //地域のみ選択されている場合
        if($area!==null){
            $query=Shop::where('area_id',$area)->orderBy('genre_id')->get();
            return $query;
        }
        //ジャンルのみ選択されている場合
        if($genre!==null){
            $query=Shop::where('genre_id',$genre)->orderBy('area_id')->get();
            return $query;
        }
        //何も選択されていない場合
        $query=Shop::orderBy('area_id')->orderBy('genre_id')->orderBy('name')->get();
            return $query;
    }
}
