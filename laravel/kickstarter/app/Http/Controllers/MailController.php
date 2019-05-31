<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailToMySelf;

class MailController extends Controller
{
    public function sendMail(){
        //dd('test');
        $mailClass = new MailToMySelf();
        Mail::to('frederick.roegiers@arteveldehs.be')->send($mailClass);
        Mail::to('annadela@student.arteveldehs.be')->send($mailClass);
    }
}
