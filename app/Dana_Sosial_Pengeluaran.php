<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dana_Sosial_Pengeluaran extends Model
{
    protected $table = 'dana_sosial_pengeluaran';
    protected $fillable = [
        'id_user',
        'keperluan',
        'jumlah',
        'tanggal',
        'keterangan'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}