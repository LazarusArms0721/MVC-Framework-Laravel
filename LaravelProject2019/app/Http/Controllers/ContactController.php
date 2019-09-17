<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Show contact form page /contact
    public function showForm(){
        return view ('contact.form');

    }
}
