<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

class ContactController extends Controller
{
    //Show contact form page /contact
    public function showForm(){
        return view ('contact.form');

    }

    public function storeContact(){

        $contact = new Contact();

        $contact->name = request('name');
        $contact->email = request('email');
        $contact->message = request('message');

        $contact->save();

        

    }
}
