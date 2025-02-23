<?php

namespace App\Http\Controllers;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Show the feedback form
    public function create()
    {
        return view('feedback-form'); 
    }

    // Handle form submission
    public function send(Request $request)
    {
        // Validate the request data first
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'comments' => 'required|string|min:10',
        ]);
    
        // Get the validated input
        $fullname = $validatedData['name'];
        $email = $validatedData['email'];
        $comment = $validatedData['comments'];
    
        // Send the email after validation
        Mail::to('comp3385@uwi.edu', 'COMP3385 Course Admin')
            ->send(new Feedback($fullname, $email, $comment));
    
        // Return success response
        return redirect()->route('feedback.success')->with('success', 'Your feedback has been sent successfully!');
    
    }
    public function success()
    {
        return view('feedback-success');
    }
}