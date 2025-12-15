<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
