<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // functie om aan te geven binnen de page model dat een Pagina bij een Assignment hoort.
    public function assignment(){

        return $this->belongsTo(Assignment::class);
    }
}
