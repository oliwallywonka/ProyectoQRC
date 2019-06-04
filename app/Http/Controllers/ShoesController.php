<?php

namespace App\Http\Controllers;


use App\Shoes;
use App\Size;
use App\Color;

use Illuminate\Http\Request;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        $sizes = Size::all();
        $shoes = Shoes::with('size','color')->where('id_model_shoe',$id_model_shoe)->get();

        return view('admin.shoes.index',[
            'shoes'=>$shoes,
            'colors'=>$colors,
            'sizes'=>$sizes
            ]);
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
        return ($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function show($id_model_shoe)
    {
        $colors = Color::all();
        $sizes = Size::all();
        $shoes = Shoes::with('size','color')->where('id_model_shoe',$id_model_shoe)->get();

        return view('admin.shoes.index',[
            'shoes'=>$shoes,
            'colors'=>$colors,
            'sizes'=>$sizes
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoes $shoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoes $shoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shoes  $shoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoes $shoes)
    {
        //
    }
}
