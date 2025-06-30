<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama_category'];

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class);
    }
}
