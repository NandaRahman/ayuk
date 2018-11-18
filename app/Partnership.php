<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content','active','price','discount','discount_start','discount_end','promo_products','promo_facilities','shipping_costs','protection_area','partnership_status','repeat_order','sales_target'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
