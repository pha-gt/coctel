<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuentahabiente extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function tarjetas(): HasMany
    {
        return $this->hasMany(Tarjeta::class);
    }
}

