<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $contacts = Contact::when($search, function ($query, $search) {
            return $query->where('email', 'like', "%{$search}%")
                ->orWhere('f_name', 'like', "%{$search}%")
                ->orWhere('l_name', 'like', "%{$search}%");
        })->latest()->paginate(5);

        return view('admin.contacts.index', compact('contacts', 'search'));
    }

    public function show(Contact $contact): View
    {
        $contact->update(['is_read' => true]);
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('status', 'success')
            ->with('msg', 'Contact deleted successfully!');
    }
}