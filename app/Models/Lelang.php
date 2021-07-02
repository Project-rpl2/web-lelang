<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;
    protected $table = 'tb_lelangs';
    protected $guarded = ['id'];
    // protected $fillable = ["id_tb_barangs","tgl_lelang","user_id"];
        // untuk relasi dengan lelang
    // jenis relasi one to many
    public function tb_barangs(){
        return $this->belongsTo(Barang::class);
    }
    public function pelelangs(){
        return $this->belongsTo(Pelelang::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    // end relasi dengan lelang
}
