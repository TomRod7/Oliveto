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

//  public function send(Request $request){
//    $rules = [
//      'name' => 'required|string',
//      'email' => 'required|email',
//      'phone' => 'required',
//      'message' => 'required|min:10',
//    ];
//    $messages = [
//      'name.required' => 'El nombre es obligatorio.',
//      'email.required'  => 'El email es obligatorio.',
//      'email.email'  => 'El email ingresado no es válido.',
//      'phone.required'  => 'El teléfono es obligatorio.',
//      'message.required'  => 'El mensaje es obligatorio.',
//      'message.min'  => 'El mensaje es muy corto.',
//    ];
//
//    $this->validate($request, $rules, $messages);
//
//    Mail::send('emails.contact', [
//      'name' => $request->name,
//      'email' => $request->email,
//      'phone' => $request->phone,
//      'adress' => $request->adress,
//      'message' => $request->message,
//    ], function ($mail) use($request){
//      $mail->from($request->email, $request->name);
//
//      $mail->to('xtompro@gmail.com')->subject('Consulta Oliveto');
//    });
//
//    return redirect()->back()->with('flash_message', 'Gracias por su consulta!');
//  }

//  public function send(ContactFormRequest $request){
//      Mail::to('xtompro@gmail.com')->queue(new ContactMail($request->all()));
//      return back();
//    }
}


//use App\Mail\ContactMail;
//use Illuminate\Http\Request;
