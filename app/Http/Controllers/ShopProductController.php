<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopProductRequest;
use App\Http\Requests\UpdateShopProductRequest;
use App\Models\Shop\ShopProduct;
use App\Models\Shop\ShopProductCategory;

class ShopProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShopProductCategory $category = null)
    {
        if (isset($category)) {
            $products = ShopProduct::where('category_id', '=', $category->id)->paginate(25);
            return view('shop.category', [
                'category' => $category,
                'products' => $products
            ]);
        }
        // Shop Homepage
        $featuredItems = ShopProduct::take(12)->get();
        $categories = ShopProductCategory::all();

        return view('shop.index', [
            'featured' => $featuredItems,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShopProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ShopProduct $shopProduct)
    {
        return view('shop.product-show', [
            'product' => $shopProduct,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopProductRequest  $request
     * @param  \App\Models\Shop\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopProductRequest $request, ShopProduct $shopProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop\ShopProduct  $shopProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopProduct $shopProduct)
    {
        //
    }
}
