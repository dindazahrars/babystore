<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = "laporan";
    protected $primarykey = "kode";
    protected $fillable = [
        'idt','id','tgl_laporan','total_laporan',
    ];
    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi','idt');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
