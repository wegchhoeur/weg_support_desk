<?php

namespace App\Http\Controllers\Web;

use Mail;
use Session;
use App\Contact;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::where('status', '1')->get();

        return view('contact', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMail(Request $request)
    {
        $settings = Setting::where('status', '1')->get();

        if(count($settings) == 1){

            foreach ($settings as $setting ){
                $sendTo = $setting->contact_mail;
                $appName = $setting->title;
            }

            // Field Validation
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);

            // Store Data
            Contact::create($request->all());


            // Passing data to email template
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['msg_body'] = $request->message;

            // Mail Information
            $senderName = $request->name;;
            $sendFrom = $request->email;
            $subject = $request->subject;

            // Send Mail
            Mail::send('emails.email', $data, function($message) use ($sendTo, $senderName, $sendFrom, $appName, $subject) {

                // Mail Information
                $message->from($sendFrom, $senderName);
                $message->to($sendTo, $appName)
                        ->subject($subject);

            });

            
            Session::flash('success', 'Mail Send Successfully!');

        }
        else{
            Session::flash('error', 'Receiver not configured!');
        }

        return redirect()->back();
    }
}
