<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'id',
        'produk',
        'harga',
        'kategori_id',
        'status_id'
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }
    public function status(){
        return $this->belongsTo(status::class);
    }
}
