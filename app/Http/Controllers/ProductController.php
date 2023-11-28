<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $products = Product::all();

        return ProductResource::collection($products);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        Product::query()->create($data);

        return response([]);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);

        return response([]);
    }

    public function destroy()
    {
        //
    }
}
