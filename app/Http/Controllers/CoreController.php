<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Illuminate\Support\Collection;
use App\Plant;

class CoreController extends Controller
{
    const DRIVE_CONFIG_URL = ' https://docs.google.com/uc?id=';

    public function categories()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $id_images = collect(json_decode($category['category_image'],true))->collapse();
            $category['category_image'] = self::DRIVE_CONFIG_URL.$id_images['sm'];
        }
        return view('categories', ['data' => $categories]);
    }

    public function plants($category_slug)
    {
        $category = Category::where('category_slug', $category_slug)
        ->where('category_visible',1)
        ->firstOrFail();
        $plants = Plant::where('category_id', $category->id)->get();

        foreach ($plants as $plant) {
            $id_images = collect(json_decode($plant['plant_image'],true))->collapse();
            $plant['plant_image'] = self::DRIVE_CONFIG_URL.$id_images['sm'];
        }
        return view('plants', [
            'data' => $plants,
            'current_category' => $category->category_name
        ]);
    }

    public function detail_plant($category_slug,$plant_slug)
    {
        $category = Category::where('category_slug', $category_slug)
        ->where('category_visible',1)
        ->firstOrFail();
        $plant = Plant::where('category_id', $category->id)->where('plant_slug' , $plant_slug)->firstOrFail();

        $id_images = collect(json_decode($plant['plant_image'],true))->collapse();
        $plant['plant_image'] = self::DRIVE_CONFIG_URL.$id_images['sm'];

        return view('detail_plant' , [
            'current_category_name' => $category->category_name,
            'current_category_slug' => $category->category_slug,
            'current_plant' => $plant->plant_name,
            'data' => $plant]
        );
    }



    
}
