<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'date_publication',
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
