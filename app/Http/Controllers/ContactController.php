<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'phone'   => 'nullable|string|max:20',
            'company' => 'nullable|string|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        ContactSubmission::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'company' => $validated['company'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        return redirect()->route('contact.index')
            ->with('success', 'Pesan Anda telah berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
