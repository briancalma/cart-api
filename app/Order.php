<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function transaction() {
        return $this->belongsTo('App\Transaction','transaction_id');
    }

    public function product() {
        return $this->hasOne('App\Product','id','product_id');
    }

}
