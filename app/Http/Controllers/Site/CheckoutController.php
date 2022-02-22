<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        $this->validate($request, [
            'first_name'      =>  'required',
            'last_name'     =>  'required',
            'address'      =>  'required',
            'city'      =>  'required',
            'country'      =>  'required',
            'post_code'      =>  'required',
            'phone_number'      =>  'required',

        ]);

        $this->orderRepository->storeOrderDetails($request->all());

        Cart::clear();

        return redirect()->route('account.orders')->with('message', 'Ordem criada com sucesso');
    }
}
