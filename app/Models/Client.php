<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    // Relacionamento One To One
    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class);
    }

    // One to Many (Para cada cliente, existe uma coleção de telefones)
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
}
