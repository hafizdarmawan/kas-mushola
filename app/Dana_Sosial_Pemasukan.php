<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dana_Sosial_Pemasukan extends Model
{
    protected $table = 'dana_sosial_pemasukan';

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
