<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactMailController extends Controller
{
    public function send(Request $request){
        $titel = request("mailtitel");
        $email = request("mailemail");
        $mail = new ContactMail();
        Mail::to('annadelanghe1@gmail.com')->send($mail);
        return redirect()->back()->with('succes','mail is verstuurd we antwoorden zo snel als mogelijk');
    }
}
