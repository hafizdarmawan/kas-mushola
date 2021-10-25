<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dana_Sosial_Pemasukan extends Model
{
    protected $table = 'dana_sosial_pemasukan';
    protected $fillable = [
        'id_users',
        'sumber',
        'jumlah',
        'tanggal',
        'keterangan'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
