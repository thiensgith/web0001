<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;

use App\Category;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_slug,$slug)
    {
        $category_id = Category::where('category_slug', $category_slug)
        ->where('category_visible',1)
        ->firstOrFail()->id;
        $getPlant = Plant::where('category_id', $category_id)->where('plant_slug' , $slug)->firstOrFail();
        return view('plant' , ['data' => $getPlant]);
    }
}
