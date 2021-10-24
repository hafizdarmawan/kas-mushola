<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas_Pemasukan extends Model
{
    protected $table = 'kas_pemasukan';

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
