<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas_Pengeluaran extends Model
{
    protected $table = 'kas_pengeluaran';

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
}
