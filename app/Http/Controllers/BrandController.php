<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::paginate(3);

        return view('web.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('web.brands.add');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => ['required', 'string', 'unique:brands,slug'],
        ]);

        $brand = Brand::create($validated);

        return back()->with('success', "$brand->name created successfully.");
    }

    public function edit($brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return back()->with('success', "$brand->name deleted successfully.");
    }
}
