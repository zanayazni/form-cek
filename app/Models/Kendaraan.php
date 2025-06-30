<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'plat_nomor',
        'category_id',
        'jumlah_stok',
        'tanggal_input'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
