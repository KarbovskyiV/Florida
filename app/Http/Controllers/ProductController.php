<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
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

    public function show()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
