<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // Ao adicionar essa propriedade $fillable eu estou permitindo que o produto possa ser injetado massivamente no banco de dados
    // Isso também significa que eu tenho que especificar os campos que serão preenchidos
    // Isso vai impedir de acrescentar o created_at e o updated_at automaticamente ao inserir o produto usando a função 'insert'
    // Dito isso, esses campos podem ser alimentados manualmente, junto com os outros dados
    protected $fillable = ['product_name', 'price'];

    // Habilitando o Soft Delete para essa tabela
    use SoftDeletes;
}
