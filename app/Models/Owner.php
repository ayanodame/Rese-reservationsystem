<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'shop_id',
        'reservation_id',
    ];

    public static function searchOwner($shopId, $email, $keywords)
    {

        $query = Owner::query();
        //店舗が選択されている場合
        if (isset($shopId)) {
            $query = $query->where('shop_id', $shopId);
        }
        //メールアドレスが入力されている場合
        if (isset($email)) {
            $query = $query->where('email', $email);
        }
        //キーワードが入力されている場合
        if (isset($keywords)) {
            $query = $query->where('name', 'LIKE', "%{$keywords}%");
        }
        $items = $query->orderBy('shop_id')->get();
        return $items;
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
