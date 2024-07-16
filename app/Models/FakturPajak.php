<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakturPajak extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getBarangJasaKenaPajak()
    {
        return $this->hasMany(BarangJasaKenaPajak::class, 'id_faktur_pajak');
    }

    public function getPembeliKenaPajak()
    {
        return $this->belongsTo(PembeliKenaPajak::class, 'id_pembeli_kena_pajak');
    }

    public function getPengusahaKenaPajak()
    {
        return $this->belongsTo(PengusahaKenaPajak::class, 'id_pengusaha_kena_pajak');
    }
}
