<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apprentice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ficha()
    {
        return $this->belongsTo(ficha::class, 'id_ficha');
    }
}
