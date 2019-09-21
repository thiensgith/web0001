<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Plant;

class CoreController extends Controller
{

    public function categories()
    {
        return view('categories', ['data' => Category::where('category_visible',1)->get()]);
    }

    public function plants($plant_slug)
    {
        $getId = Category::where('category_slug', $plant_slug)
        ->where('category_visible',1)
        ->firstOrFail()->id;
        return view('plants', ['data' => Plant::where('category_id', $getId)->paginate(10)]);
    }

    public function detail_plant($category_slug,$plant_slug)
    {
        $category_id = Category::where('category_slug', $category_slug)
        ->where('category_visible',1)
        ->firstOrFail()->id;
        $getPlant = Plant::where('category_id', $category_id)->where('plant_slug' , $plant_slug)->firstOrFail();
        return view('detail_plant' , ['data' => $getPlant]);
    }



    
}
