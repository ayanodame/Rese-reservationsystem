<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function owner()
    {
        return $this->belongsTo(('App\Models\Owner'));
    }

    public static function searchShop($areaId, $genreId, $keywords)
    {

        $query = Shop::query();
        //地域が選択されている場合
        if (isset($areaId)) {
            $query = $query->where('area_id', $areaId);
        }
        //ジャンルが選択されている場合
        if (isset($genreId)) {
            $query = $query->where('genre_id', $genreId);
        }
        //キーワードが入力されている場合
        if (isset($keywords)) {
            $query = $query->where('name', 'LIKE', "%{$keywords}%");
        }
        $items = $query->orderBy('area_id')->orderBy('genre_id')->get();
        return $items;
    }
    public function likedByAuthUser()
    {
        $id = Auth::id();
        $likeArray = array();
        foreach ($this->likes as $like) {
            array_push($likeArray, $like->user_id);
        }

        if (in_array($id, $likeArray)) {
            return true;
        } else {
            return false;
        }
    }
}
