<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('brand.index');
        $brands=Brand::all();
        // return response()->json($color);
        return view('admin.brands.index', ['brands'=>$brands]);
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
        /*$brand =Brand::create($request->all());
        return response()->json($brand,201);*/
        $request->validate([
            'brand'=>'required'
        ]);

        Brand::create($request->except(['_token']))->save();

        return redirect()->route('admin.brands.index')->with('succes','Marca creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Brand::findOrFail($id);

        return view('admin.brands.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->brand = $request->input('brand');
        $brand->description = $request->input('description');
        if($request=null){
            return back()->with('warning','No pueden ir campos vacios');
        }else{
            $brand->save();
        return back()->with('success','Marca editada exitosamente');
        }

/*        $brand->update($request->all());
        return response()->json($brand,200);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('admin.brands.index');
       /* $brand->delete();
        return response()->json(null,204);*/
    }
}
