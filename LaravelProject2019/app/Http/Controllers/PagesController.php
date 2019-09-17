<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Get index page
    //Put the url in there
    public function getIndex(){

        $page_title = "Home";
        return view ('pages.index', ['page_title' => $page_title]);
    }

    public function getAbout(){
        return view ('pages.about');
    }

}
