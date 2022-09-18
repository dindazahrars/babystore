<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";
    protected $primarykey = "idorder";
    protected $fillable = [
        'id','total','harga',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product','id');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi','idorder');
    }
}
