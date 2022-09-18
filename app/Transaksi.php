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

    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
    public function order()
    {
        return $this->belongsTo('App\Order','idorder');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Laporan','idt');
    }
}
