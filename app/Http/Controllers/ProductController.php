<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest as RequestsStoreProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductCollection(Product::all());
    }

    public function store(StoreProductRequest $request)
    {
        return Product::create($request->all());
    }

    public function show(Product $product)
    {
        $product = new ProductResource($product);
        return $product;
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}
