<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AttributeGroup;
use App\Models\Admin\Category;
use App\Models\Admin\File;
use App\Models\Admin\Manufacturer;
use App\Models\Admin\Product;
use App\Models\Admin\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $nameColumns = $product->nameColumns();
        $products = $product->with('attributes', 'categories')->get();

        return view('admin.products.index', compact('nameColumns', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, AttributeGroup $attributeGroup, Provider $provider, Manufacturer $manufacturer)
    {
        $groups = $attributeGroup->with('attributes')->get();
        $categories = $category->allWithPath();
        $providers = $provider->all();
        $manufacturers = $manufacturer->all();


        return view('admin.products.create', compact('groups', 'categories', 'manufacturers', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $product = Product::create($request->all());
        $attributes = request('attributes');
        $categories = request('categories');



        $product->saveFiles($request);

        $product->attributes()->sync($attributes);
        $product->categories()->sync($categories);

        return redirect()->route('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Category $category, AttributeGroup $attributeGroup)
    {
        $product = $product->with('attributes', 'categories', 'files')->firstOrFail();
        $categories = $category->allWithPath();
        $groups = $attributeGroup->with('attributes')->get();

        return view('admin.products.edit', compact('product', 'categories', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        $attributes = request('attributes');
        $categories = request('categories');

        $product->attributes()->sync($attributes);
        $product->categories()->sync($categories);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->attributes()->detach();
        $product->categories()->detach();
        $product->delete();

        return redirect()->route('products.index');
    }
}
