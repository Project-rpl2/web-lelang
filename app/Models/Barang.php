<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tb_barangs';

    protected $guarded = ['id'];

    // untuk relasi dengan lelang dan pelelang
    // jenis relasi one to many
    public function lelang(){
        return $this->hasMany(Lelang::class);
    }
    public function pelelang(){
        return $this->hasMany(Pelelang::class);
    }
    // end relasi dengan lelang dan pelelang
}
