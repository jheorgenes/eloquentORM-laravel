<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    // Many To Many
    public function products(): BelongsToMany
    {
        // Eu determino qual e a tabela que eu terei relacionamento (Product::class)
        // Defino em qual tabela será estabelecida a relação (no caso, a tabela 'orders' será a tabela auxiliar do relacionamento)
        // Eu defino que 'client_id' é o foreingPivot desse Model Client
        // Eu também defino que 'product_id' é o relatedPivot da relação com o Model Product
        return $this->belongsToMany(Product::class, 'orders', 'client_id', 'product_id');
    }
}
