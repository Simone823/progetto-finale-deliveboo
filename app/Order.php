<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plates(){
        return $this->belongsToMany('App\Plate');
    }

    protected $fillable = [
        'guest_name',
        'guest_surname',
        'guest_email',
        'guest_city',
        'guest_cap',
        'guest_address',
        'guest_phone',
    ];
}
