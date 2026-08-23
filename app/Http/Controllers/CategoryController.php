<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\json;

class CategoryController extends Controller
{
    public function store(): void
    {

        DB::table(
            'categories'
        )->insert([
            'name' => 'sport',
            'slug' => 'sport-slug'
        ]);
    }

    public function index()
    {
        return DB::table('categories')->get();
    }


    public  function whereCondition()
    {
        $categoty = DB::table('categories')->where(
            'name',
            '=',
            "sport"
        )->orWhere(
            'id','=', 9
        )->get();
        return $categoty;
    }
}
