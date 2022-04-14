<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'shop_id',
        'reservation_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_varified_at' => 'datetime',
    ];

    public function shop()
    {
        return $this->hasOne('App\Models\Shop');
    }

    public static function searchOwner($shopId, $email, $keywords)
    {

        $query = Owner::query();
        //店名が選択されている場合
        if (isset($shopId)) {
            $query = $query->whereHas('shop', function ($query) use ($shopId) {
                $query->where('id', $shopId);
            });
        }
        //メールアドレスが入力されている場合
        if (isset($email)) {
            $query = $query->where('email', $email);
        }
        //キーワードが入力されている場合
        if (isset($keywords)) {
            $query = $query->where('name', 'LIKE', "%{$keywords}%");
        }
        $items = $query->Paginate(5,['*'],'itempages');
        return $items;
    }
}
