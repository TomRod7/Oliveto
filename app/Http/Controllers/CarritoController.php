<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
Use App\Notifications\InboxMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartFormRequest;
use App\Admin;
use Mail;
use App\Mail\OrderMail;
use App\Http\Requests;


class CarritoController extends Model
{
    public function index(){
      return view('carrito');
    }


    // request-> name, phone, email, address, cart

      public function sendMail(Request $request){
        $mail = new OrderMail($request->all());
        Mail::to('pabloandrioli77@gmail.com')->send($mail);
        return json_encode($mail);
      }

    public function details(){
      return $this->hasMany(CartDetail::class);
    }

    public function getTotalAttribute(){

      $total = 0;
      foreach ($this->details as $detail) {
        $total += $detail->quantity * $detail->product->price;
      }
      return $total;
    }
}
