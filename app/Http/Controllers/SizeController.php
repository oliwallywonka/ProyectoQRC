<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes=Size::all();
        return view('admin.sizes.index', ['sizes'=>$sizes]);
        //return view('size.index');
        //return Size::all();
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
        $request->validate([
            'size'=>'required'
        ]);

        Size::create($request->except(['_token']))->save();

        return redirect()->route('admin.sizes.index')->with('succes','Color creado exitosamente');
       /* $size =Size::create($request->all());
        return response()->json($size,201);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Size::findOrFail($id);

        return view('admin.sizes.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $size = Size::findOrFail($id);
        $size->size = $request->input('size');
        if($request=null)
        {
            return back()->with('warning','No pueden ir campos vacios');
        }else{
            $size->save();
            return back()->with('success','Color editado exitosamente');
        }

    /*  $color->update($request->all());
        return response()->json($size,200);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);
        $size->delete();
        return redirect()->route('admin.sizes.index');
        /*$size->delete();
        return response()->json(null,204);*/
    }
}
