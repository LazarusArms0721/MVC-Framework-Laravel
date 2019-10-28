<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $guarded = [];


    //functie om binnen assignment model de page class aan te roepen, hier stel je dat een Assignment veel Blogs heeft.
    public function blogs(){

        return $this->hasMany(Blog::class);

    }
}
