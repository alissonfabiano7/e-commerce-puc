<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function getCart()
    {
        return view('site.pages.cart');
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        return redirect()->back()->with('message', 'Item removido do carrinho com sucesso');
    }

    public function clearCart()
    {
        Cart::clear();

        return redirect()->back()->with('message', 'Carrinho esvaziado com sucesso');
    }
}
