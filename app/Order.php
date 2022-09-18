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

    public function barang()
    {
        return $this->belongsTo('App\barang','id');
    }
}
