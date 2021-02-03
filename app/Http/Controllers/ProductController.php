<?php

namespace App\Http\Controllers;

use App\Helper\ImageUpload;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::query()->latest()->get();

        return view('welcome', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    public function store(ProductStoreRequest $request)
    {
        $product = Product::query()->create(Arr::except($request->validated(), 'image'));

        if ($request->hasFile('image')) {
            $name = ImageUpload::uploadGetName($request->file('image'));
            $product->update(['image' => $name]);
        }

        return back();
    }

    public function show(Product $product)
    {
        return view('show', compact('product'));
    }
}
