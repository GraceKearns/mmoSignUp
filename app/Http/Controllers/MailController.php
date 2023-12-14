<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'body' => 'required',
            'attachment.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validation rules for images
        ]);

        $email = $validatedData['email'];
        $content = $validatedData['body'];

        $images = $request->file('attachment'); // Get uploaded images

        Mail::raw($content, function ($message) use ($email, $images) {
            $message->to('routepokemon@gmail.com')
                ->subject('Question from ' . $email);

            foreach ($images as $image) {
                $message->attach($image->getRealPath(), [
                    'as' => $image->getClientOriginalName(),
                    'mime' => $image->getMimeType(),
                ]);
            }
        });

        // Optionally, you can redirect back with a success message
        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}

