<?php

Namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\InboxMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Admin;
use Mail;
use App\Mail\ContactMail;
use App\Http\Requests;


class ContactController extends Controller
{
  public function show(){
    return view('contacto');
  }

  public function sendMail(Request $request){
    $mail = new ContactMail($request->all());
    Mail::to('pabloandrioli77@gmail.com')->send($mail);
    return json_encode($mail);
  }
}
