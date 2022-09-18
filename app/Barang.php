<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $primarykey = "id";
    protected $fillable = [
        'nama','foto','brand','desc','stock','harga'
    ];
    public function order()
    {
        return $this->belongsTo('App\Order','id');
    }
}
