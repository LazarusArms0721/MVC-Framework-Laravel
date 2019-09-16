<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Get index page
    //Put the url in there
    public function getIndex(){
        return view ('pages.index');
    }

    public function getAbout(){
        return view ('pages.about');
    }
}
