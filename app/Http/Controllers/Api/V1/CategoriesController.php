<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Category;
use Image;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $category['category_image'] = Storage::url('categories/sm_'.$category['category_image']);
            //asset('storage/sm_'.$category['category_image']);
        }
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //USE VUEJS
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'category_image' => $this->imageProcessing($request->category_image[0]['dataURL'],'categories'),
            'category_slug' => $this->sluger($request->category_name),
        ]);
        $category = Category::create($request->all());
        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $category['category_image'] = Storage::url('categories/sm_'.$category['category_image']);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //USE VUEJS
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        
        
        if ($request->category_image) {
            $request->merge([ 
            'category_image' => $this->imageProcessing($request->category_image[0]['dataURL'],'categories'),
            'category_slug' => $this->sluger($request->category_name)
        ]);
            $category->update($request->all());
        } else {
            $request->merge([
                'category_slug' => $this->sluger($request->category_name)
            ]);
            $category->update($request->except(['category_image']));
        }

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Storage::disk('local')->delete('public/categories/lg_'.$category->category_image);
        Storage::disk('local')->delete('public/categories/sm_'.$category->category_image);
        foreach ($category->plants as $plant) {
            Storage::disk('local')->delete('public/plants/lg_'.$plant->plant_image);
            Storage::disk('local')->delete('public/plants/sm_'.$plant->plant_image);
        }
        $category->plants()->delete();
        $category->delete();
        return '';
    }

    /**
     * Image processing from base64 encoded image data
     *
     * @param string $img
     * @return string [Name of image]
     */
    public function imageProcessing(String $img,String $path)
    {
        //Big
        $big = Image::make($img);
        $big->resize(640, 480, function ($constraint) {
                        $constraint->aspectRatio();
                    });
        $big->encode('jpg',90);
        //Small
        $small = Image::make($img);
        $small->resize(320, 240, function ($constraint) {
                        $constraint->aspectRatio();
                    });
        $small->encode('jpg',90);
        $imageName = time().'-'.random_int(0, 1000);
        Storage::disk('local')->put('public/'.$path.'/lg_'.$imageName.'.jpg', $big);
        Storage::disk('local')->put('public/'.$path.'/sm_'.$imageName.'.jpg', $small);
        return $imageName.'.jpg';
    }
}
