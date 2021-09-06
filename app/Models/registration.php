<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ficha_r()
    {
        return $this->belongsTo(ficha::class, 'id_ficha');
    }

    public function monitor()
    {
        return $this->belongsTo(apprentice::class, 'id_monitor');
    }

    public function instructor()
    {
        return $this->belongsTo(instructor::class, 'id_instructor');
    }

    public function jornada()
    {
        return $this->belongsTo(working_day::class, 'id_jornada');
    }
}
