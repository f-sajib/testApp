<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function send(Request $request) 
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:100',
            'message' => 'required|max:500',
            'subject' => 'required',
        ]);
        
        $inputs = $request->all();

        $sub = $inputs['subject'];
        $to = env('MAIL_FROM_ADDRESS');
        try {
            Mail::send(
                'mails.sendContactMail',
                $inputs,
                function ($message) use ($to,$sub) {
                    $message->to($to)
                ->subject($sub);
                }
            );
            return redirect()->back()->with(['alert' => 'success' , 'message' => 'Email Sent Successfully.']);
        } catch (\Exception $e) {
            throw new Exception;
        }
        
    }
}
