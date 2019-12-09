<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function new()
    {
        return view('contact');
    }
    public function add(Request $req)
    {
        $new_contact = Contact::create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'title' => $req->title,
            'email' => $req->email,
            'phone' => $req->phone,
            'description' => $req->note
        ]);
        return redirect()->route('contact.new')->with('success','Add contact success');
    }
    
}
