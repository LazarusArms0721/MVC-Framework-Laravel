<?php

namespace App;

use App\Filters\AssignmentFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Assignment extends Model
{
    protected $fillable = ['name','assignment_text','assignment_image'];


    //functie om binnen assignment model de page class aan te roepen, hier stel je dat een Assignment veel Blogs heeft.
    public function blogs(){

        return $this->hasMany(Blog::class);
    }

    public function scopeFilter(Builder $builder, $request){
        return (new AssignmentFilter($request))->filter($builder);

    }
}
