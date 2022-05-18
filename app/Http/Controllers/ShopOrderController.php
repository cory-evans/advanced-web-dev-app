<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Shop\ShopOrder;
use App\Models\Shop\ShopOrderLineItem;
use Auth;
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

    public function store(StoreOrderRequest $request)
    {
        $shopOrder = new ShopOrder();
        $shopOrder->status = 'placed';
        $shopOrder->total_price = 0;
        $shopOrder->email = $request->input('email');
        $shopOrder->save();

        $items = json_decode($request->input('items'));

        $total_price = 0;

        foreach ($items as $key => $value) {
            $orderLineItem = new ShopOrderLineItem();
            $orderLineItem->product_id = $key;
            $orderLineItem->order_id = $shopOrder->id;
            $orderLineItem->price_cents = 0;
            $orderLineItem->qty = $value->qty;
            $orderLineItem->save();

            $total_price += $orderLineItem->product->price_cents;
        }

        $shopOrder->total_price = $total_price;
        $shopOrder->save();

        return redirect(route('checkout.finished', ['shopOrder' => $shopOrder]));
    }

    public function finished(ShopOrder $shopOrder)
    {
        return view('shop.checkout.finished', ['shopOrder' => $shopOrder]);
    }
}
