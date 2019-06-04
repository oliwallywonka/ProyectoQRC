<?php

namespace App\Http\Controllers;

use App\Model_shoe;
use App\Category;
use App\Brand;
use App\Shoes;
use App\Color;
use App\Size;
use Illuminate\Http\Request;

class ModelShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $categories = Category::all();
        $brands = Brand::all();
        $model_shoes = Model_shoe::with('category','brand')->get();

        return view('admin.model_shoes.index',[
            'model_shoes'=>$model_shoes,
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model_shoe = new Model_shoe;
        $model_shoe->id_brand = $request->id_brand;
        $model_shoe->id_category = $request->id_category;
        $model_shoe->model = $request->model;
        $model_shoe->ref_price = $request->ref_price;
        $model_shoe->save();

        return redirect()->route('admin.model_shoes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model_shoe  $model_shoe
     * @return \Illuminate\Http\Response
     */
    public function show(Model_shoe $model_shoe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model_shoe  $model_shoe
     * @return \Illuminate\Http\Response
     */
    public function edit(Model_shoe $model_shoe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model_shoe  $model_shoe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model_shoe $model_shoe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model_shoe  $model_shoe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_shoe $model_shoe)
    {
        //
    }
}
