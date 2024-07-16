<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengusahaKenaPajak extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getFakturPajak()
    {
        return $this->hasMany(FakturPajak::class, 'id_pengusaha_kena_pajak');
    }
}
