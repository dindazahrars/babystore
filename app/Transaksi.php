<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
    protected $primarykey = "idt";
    protected $fillable = [
        'id','idorder','status','metode',
    ];

    public function barang()
    {
        return $this->belongsTo('App\Barang','id');
    }
    public function order()
    {
        return $this->belongsTo('App\Order','idorder');
    }
}
