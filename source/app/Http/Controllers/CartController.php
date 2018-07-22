<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function update(Request $request)
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save();

    	$notification = 'Tú pedido se ha registrado correctamente. Te contactaremos vía email muy pronto!'; 
    	return back()->with(compact('notification')); 
    }
}
