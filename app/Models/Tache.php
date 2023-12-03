<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'text',
        'status',
        'date_debut',
        'date_fin',
        'barre',
        'user_id',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
