<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    // Fazendo o relacionamento inverso (Varios phones pertencem a um determinado client)
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
