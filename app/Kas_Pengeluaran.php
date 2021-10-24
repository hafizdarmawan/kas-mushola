<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas_Pengeluaran extends Model
{
    protected $table = 'kas_pengeluaran';

    protected $fillable = [
        'id_user',
        'keperluan',
        'jumlah',
        'tanggal',
        'keterangan'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
}
