<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    //

    public function index(){
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create() {
        return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->post());

        return redirect()->route('contacts.index')->with('success','Contact has been created successfully.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show',compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit',compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        
        $contact->fill($request->post())->save();

        return redirect()->route('contacts.index')->with('success','Contact has been updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success','Contact has been deleted successfully');
    }
}
