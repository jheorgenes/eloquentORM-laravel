<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesteModel extends Model
{
    // Se quiser definir qual é a tabela do model.
    protected $table = 'products';

    // definir a chave primaria
    protected $primaryKey = 'id';

    // Retirando o auto Incremento da chave primária
    public $incrementing = false;

    // Definindo que a chave primária é do tipo String
    protected $keyType = 'string';

    // Desativando created_at e updated_at de serem criados na base
    public $timestamps = false;

    // Definindo um formato padrão para datas e horas na base de dados
    protected $dateFormat = 'Y-m-d H:i:s';

    // Renomeando as colunas created_at e updated_at
    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    //Definindo que esse model terá conexão com outra base de dados
    protected $connection = 'mysql_new';
}
