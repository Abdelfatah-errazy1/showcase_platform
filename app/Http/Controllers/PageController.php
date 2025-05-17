<?php

namespace App\Http\Controllers;

use \App\Mail\ContactMail;
use App\Models\Contact;
use \Mail;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function test()
    {
        return view('welcome');
    }
    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }

    public function termsAndConditions()
    {
        return view('pages.terms-and-conditions');
    }

    public function aboutUs()
    {
        return view('pages.about-us');
    }

    public function contactUs()
    {
        return view('pages.contact-us');
    }
    public function submitContact(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);
    Contact::create($validated);
    // إرسال رسالة عبر البريد الإلكتروني
    Mail::to($validated['email'])->send(new ContactMail($validated));

    return redirect()->back()->with('success', 'تم إرسال الرسالة بنجاح!');
}

}
