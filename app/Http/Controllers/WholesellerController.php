<?php

namespace App\Http\Controllers;

use App\Wholeseller;
use Illuminate\Http\Request;

class WholesellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wholesellers=Wholeseller::all();
        return view('admin.wholesellers.index', ['wholesellers'=>$wholesellers]);
       // return view("wholeseller.index");
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
            'name'=>'required',
            'ci' => 'required',
            'phone'=> 'required'
        ]);

        Wholeseller::create($request->except(['_token']))->save();

        return redirect()->route('admin.wholesellers.index')->with('succes','Color creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wholeseller  $wholeseller
     * @return \Illuminate\Http\Response
     */
    public function show(Wholeseller $wholeseller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wholeseller  $wholeseller
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Wholeseller::findOrFail($id);

        return view('admin.wholesellers.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wholeseller  $wholeseller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wholeseller = wholeseller::findOrFail($id);
        $wholeseller->name = $request->input('name');
        $wholeseller->ci = $request->input('ci');
        $wholeseller->phone = $request->input('phone');
        if($request->ci == null or $request->phone== null or $request->name == null){
            return back()->with('warning','No pueden ir campos vacios');
        }else{
            $wholeseller->save();
            return back()->with('success','Cliente editado exitosamente');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wholeseller  $wholeseller
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wholeseller = Wholeseller::find($id);
        $wholeseller->delete();
        return redirect()->route('admin.wholesellers.index');
    }
}
