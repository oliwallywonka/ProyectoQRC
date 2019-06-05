<?php

namespace App\Http\Controllers;


use App\Shoes;
use App\Size;
use App\Color;
use App\Model_shoes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $shoes = Shoes::with('color','size')->where('id_model_shoe',$id_model_shoe)
                                            ->where('id_size','size.id')
                                            ->where('id_color','color.id')
                                            ->get();

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
        /*$shoes = new Shoes;
        $length =count($request->id_size);
        for($i = 0; $i<$length; $i++ ){
            $shoes->id_model_shoe = $request->id_model_shoe;
            $shoes->id_size = $request->id_size[$i];
            $shoes->id_color = $request->id_color;
            $shoes->save();
           return ($shoes);
        }*/

        //return redirect()->route('admin.shoes.show',$request->id_model_shoe);
        $length =count($request->id_size);
        for($i = 0; $i<$length; $i++ ){

            DB::table('shoes')->insert([
                ['id_model_shoe'=>$request->id_model_shoe,
                 'id_size'=>$request->id_size[$i],
                 'id_color'=>$request->id_color
                ]
            ]);
        }

        return redirect()->route('admin.shoes.show',$request->id_model_shoe);
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
        $shoes = Shoes::with('color','size')->where('id_model_shoe',$id_model_shoe)
                                            ->get();

        return view('admin.shoes.index',[
            'shoes'=>$shoes,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'id_model_shoe'=>$id_model_shoe
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
