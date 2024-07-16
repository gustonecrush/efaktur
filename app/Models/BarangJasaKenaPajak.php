<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangJasaKenaPajak extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getFakturPajak()
    {
        return $this->belongsTo(FakturPajak::class, 'id_faktur_pajak');
    }
}
