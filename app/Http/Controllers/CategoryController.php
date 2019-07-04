<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Plant;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $getId = Category::where('category_slug', $slug)
        ->where('category_visible',1)
        ->firstOrFail()->id;
        return view('category', ['data' => Plant::where('category_id', $getId)->paginate(10)]);
    }



    
}
