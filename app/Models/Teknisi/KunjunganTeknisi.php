<?php

namespace App\Models\Teknisi;

use App\Models\Konsumen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganTeknisi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'tanggal_kunjungan' => 'date',
    ];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'konsumen_id');
    }
}
