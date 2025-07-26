<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'num_tel',
        'email',
        'methode_livraison',
        'estimation_temps',
        'produit_id'
    ];

    public function produit()
    {
        return $this->belongsTo(Product::class, 'produit_id');
    }
}
