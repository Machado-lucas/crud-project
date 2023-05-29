<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Resources\V1\ContactCollection;
use App\Http\Resources\V1\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    // Show all content from database
    public function index() 
    {
        return new ContactCollection(Contact::paginate());
    }

    // Store from form
    public function store (StoreContactRequest $request)
    {
        Contact::create($request->validated());
        return response()->json('Contact Created!');
    }

    // Show specific contact 
    public function show (Contact $contact)
    {
        return new ContactResource($contact);
    }

    // Update
    public function update (StoreContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());
        return response()->json('Contact updated!');
    }

    // Delete
    public function destroy (Contact $contact)
    {
        $contact->delete();
        return response()->json('Deleted!');
    }

}
