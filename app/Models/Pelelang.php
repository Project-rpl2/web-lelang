<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelelang extends Model
{
    use HasFactory;

    protected $table = 'pelelangs';

    protected $guarded = ["id"];

    public function tb_barangs(){
        return $this->belongsTo(Barang::class);
    }
    public function lelangs(){
        return $this->hasOne(Lelang::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
