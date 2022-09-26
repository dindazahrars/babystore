<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = "laporan";
    protected $primarykey = "kode";
    protected $fillable = [
        'id','idt','tgl',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi','idt');
    }
}
