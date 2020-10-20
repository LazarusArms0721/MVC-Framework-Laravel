<?php

namespace App\Http\Controllers;

use App\Notifications\TaskCompleted;
use Illuminate\Http\Request;

use App\Contact;

class ContactController extends Controller
{
    //Show contact form page /contact
    public function showForm(){
        return view ('contact.form');

    }

    public function storeContact(Request $request){

        $contact = new Contact();
        $contact->name = request('name');
        $contact->email = request('email');
        $contact->message = request('message');
        $contact->save();

        event(new TaskCompleted($contact));

        return view('contact.form');
    }
}
