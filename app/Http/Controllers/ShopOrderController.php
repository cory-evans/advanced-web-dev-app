<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderShipping;
use App\Models\Shop\ShopOrder;
use Illuminate\Http\Request;

class ShopOrderController extends Controller
{
    /**
     * View the checkout page
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        return view('shop.checkout.view');
    }

    public function store(Request $request)
    {
        $shopOrder = new ShopOrder();
        $shopOrder->status = 'draft';
        $shopOrder->save();

        $items = json_decode($request->input('items'));

        return redirect(route('checkout.shipping', ['shopOrder' => $shopOrder]));
    }

    public function shipping(ShopOrder $shopOrder)
    {
        return view('shop.checkout.shipping');
    }
    public function store_shipping(ShopOrder $shopOrder, StoreOrderShipping $storeOrderShipping)
    {
        return redirect(route('checkout.payment', ['shopOrder' => $shopOrder]));
    }

    public function payment(ShopOrder $shopOrder)
    {
        return view('shop.checkout.payment', ['shopOrder' => $shopOrder]);
    }
}
