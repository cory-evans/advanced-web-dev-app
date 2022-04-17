<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopProductRequest;
use App\Http\Requests\UpdateShopProductRequest;
use App\Models\Media;
use App\Models\Shop\ShopProduct;

class AdminShopProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ShopProduct::orderBy('id')->take(50)->get();
        return view('admin.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShopProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopProductRequest $request)
    {
        $product = new ShopProduct();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price_cents = $request->price_cents;
        $product->is_featured = $request->has('is_featured');

        $product->media_id = $request->image_id;

        $product->save();

        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ShopProduct $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopProduct $product)
    {
        return view('admin.product-edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopProductRequest  $request
     * @param  \App\Models\Shop\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopProductRequest $request, ShopProduct $product)
    {
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price_cents = $request->price_cents;
        $product->is_featured = $request->has('is_featured');

        // get media from 'image_id'
        $product->media_id = $request->image_id;

        $product->save();

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopProduct $product)
    {
        $product->delete();
    }
}
