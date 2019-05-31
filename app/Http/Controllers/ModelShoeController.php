<?php

namespace App\Http\Controllers;

use App\Model_shoe;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;

class ModelShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model_shoes = Model_shoe::all();

        return view('admin.shoes.index',['model_shoes'=>$model_shoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
