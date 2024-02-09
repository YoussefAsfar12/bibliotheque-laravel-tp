<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Emprunt extends Model
{
    use HasFactory;
    protected $fillable = ['livre_id', 'date_emprunt', 'date_retour'];

    public function livre(): BelongsTo
    {
        return $this->belongsTo(Livre::class);
    }
}
