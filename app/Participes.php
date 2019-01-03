<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participes extends Model
{
    //Propriétes de parametrage
    protected $table = 'participes';#index le nom la table que le modele utilisera
    protected $keyType = string;#paramette le type de la clé primaire en string
    public $incrementing = false;#Annule l'autoincrématation de la clé primaraire
}
