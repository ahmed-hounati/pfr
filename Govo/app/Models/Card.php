<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public function plat()
    {
        return $this->belongsTo(Plat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_cards', 'card_id', 'order_id');
    }

    public function scopeWithRestoName($query)
    {
        return $query->join('users', 'cards.resto_id', '=', 'users.id')
            ->select('cards.*', 'users.name as resto_name');
    }


}
