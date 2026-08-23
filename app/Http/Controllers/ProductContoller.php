<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductContoller extends Controller
{
    // public function index()
    // {
    //     $products =  DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->select(
    //         'products.*',
    //         'categories.name as categoryName',
    //         'categories.slug as categorySlug',
    //         'categories.image as categoryImage'
    //     )->get();
    //     return $products;
    // }

    public function index()
    {
        // $products = Product::where('featured', '=', 'yes')->where(function ($static) {
        //     $static->where('status', 'published')->orWhere('out_of_stock', 'in_stock');
        // })->get();

        // $products = Product::whereIn('id', [1,2,3])->get()->toArray();

        // $products = Product::where('regular_price', 532759)->where('sale_price', 56554)->get();
        //$products = Product::whereAll(['regular_price', 'sale_price'], '=',532759 )->get();
        $products = Product::whereAny(['regular_price', 'sale_price', 'name'], 'like','%Car%' )->get();

        return $products;
    }
}
