<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller

{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        $data = $request->only(['name', 'email', 'message']);

        Mail::send('emails.contact', $data, function($mail) use ($data){
            $mail->to('admin@gmail.com')
                    ->subject('Contact form submitted');
        });
        return back()->with('success', 'Thanks for contacting us!');
    }
}
