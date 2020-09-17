<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filters\BlogFilter;
use Illuminate\Database\Eloquent\Builder;

class Blog extends Model
{
    // functie om aan te geven binnen de page model dat een Pagina bij een Assignment hoort.
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }


    // Aanduiden dat bij elke blogpost de assignment_id als naam kan worden weergeven.
    public function assignmentName()
    {
        return $this->belongsTo('App\Assignment', 'assignment_id');
    }

    // Filtermogelijkheden door een informatie door te sturen naar de header.
    public function scopeFilter(Builder $builder, $request){
        return (new BlogFilter($request))->filter($builder);

    }

}
