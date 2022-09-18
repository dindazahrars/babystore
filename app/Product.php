<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $primarykey = "id";
    protected $fillable = [
        'nama','foto','brand','desc','stock','harga'
    ];

    public function order()
    {
        return $this->hasMany('App\Order','id');
    }
}
