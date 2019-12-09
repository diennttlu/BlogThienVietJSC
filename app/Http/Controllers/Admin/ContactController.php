<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function show()
    {
        $contacts = Contact::paginate(6);

        return view('admin.contact.index', compact('contacts'));
    }
    public function new()
    {
        return view('admin.contact.add-contact');
    }
    public function add(Request $req)
    {
        Contact::create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'email' => $req->email,
            'phone' => $req->phone,
            'title' => $req->title,
            'description' => $req->description
        ]);
        return redirect()->route('admin.contact_show')->with('success','Add contact success');
    }
}
