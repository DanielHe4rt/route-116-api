<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\HandleProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getProducts(): JsonResponse
    {
        return response()->json(Product::paginate());
    }

    public function postProduct(HandleProductRequest $request): JsonResponse
    {
        return response()->json(Product::create($request->validated()));
    }

    // time to go fml to indo pra casa dps termino saporra
}
