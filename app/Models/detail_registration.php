<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_registration extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function aprendiz()
    {
        return $this->belongsTo(apprentice::class, 'id_aprendiz');
    }
}
