<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Rules\ValidRealPhoneNumber;

class EnquiryController extends Controller
{
    public function contact(Request $request)
    {
        $role = $request->query('role', 'student');
        return view('pages.contact', compact('role'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:student,institution,volunteer,csr,mentor',
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'string', 'max:30', new ValidRealPhoneNumber],
            'organization' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'interests' => 'nullable|string|max:500',
            'message' => 'required|string|min:5|max:2000',
        ], [
            'name.min' => 'Please enter your full name.',
            'phone.required' => 'A valid phone number is required to coordinate with you.',
            'message.min' => 'Please provide a brief message explaining your query.',
        ]);

        Enquiry::create([
            'type' => $validated['type'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'organization' => $validated['organization'] ?? null,
            'designation' => $validated['designation'] ?? null,
            'interests' => $validated['interests'] ?? null,
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Thank you! Your enquiry has been received. A Yuvalay coordinator will reach out to you shortly.');
    }
}
