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

        $this->validate($request, [
            'name' => 'required|min: 3',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'message' => 'required|min: 15'
        ]);

        if ($request->faxonly) {
            return redirect()->back()
                ->withSuccess('Your form has been submitted');
        }


        $contact = new Contact();
        $contact->name = request('name');
        $contact->email = request('email');
        $contact->message = request('message');
        $contact->save();

        event(new TaskCompleted($contact));

        return view('contact.form');
    }
}
