<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReceived;

class ContactController extends Controller
{
    public function store_contact(Request $request)
    {
        $validated = $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ], [
            'f_name.required' => 'The first name field is required.',
            'f_name.max' => 'The first name field must not be greater than 255 characters.',
            'l_name.required' => 'The last name field is required.',
            'l_name.max' => 'The last name field must not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.max' => 'The email field must not be greater than 255 characters.',
            'subject.required' => 'The subject field is required.',
            'subject.max' => 'The subject field must not be greater than 255 characters.',
            'message.required' => 'The message field is required.',
        ]);
        DB::beginTransaction();
        try {
            $contact = Contact::create($validated);

            // Send email notification
            Mail::to(config('mail.from.address'))->send(new ContactReceived($contact));

            DB::commit();
            return redirect()->back()->with([
                'status' => 'success',
                'msg' => 'Contact form submitted!',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with([
                'status' => 'failed',
                'msg' => 'Something went wrong! Please try again later.',
            ]);
        }
    }
}
