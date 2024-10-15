<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    // Many To Many
    public function clients(): BelongsToMany
    {
        // Eu determino qual e a tabela que eu terei relacionamento (Client::class)
        // Defino em qual tabela será estabelecida a relação (no caso, a tabela 'orders' será a tabela auxiliar do relacionamento)
        // Eu defino que 'product_id' é o foreingPivot desse Model Product
        // Eu também defino que 'client_id' é o relatedPivot da relação com o Model Client
        return $this->belongsToMany(Client::class, 'orders', 'product_id', 'client_id');
    }
}
