<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::all();
        return view('admin.clients.index', ['clients'=>$clients]);
        //return view('client.index');
       // return Client::all();
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
            'n_invoice'=> 'required'
        ]);

        Client::create($request->except(['_token']))->save();

        return redirect()->route('admin.clients.index')->with('succes','Color creado exitosamente');
        /*$client =Client::create($request->all());
        return response()->json($client,201);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Client::findOrFail($id);

        return view('admin.clients.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->name = $request->input('name');
        $client->ci = $request->input('ci');
        $client->n_invoice = $request->input('n_invoice');
        if($request->ci == null or $request->n_invoice == null or $request->name == null){

            return back()->with('warning','No pueden haber campos vacios');

        }else{

            $client->save();
            return back()->with('success','Cliente editado exitosamente');

        }

        /*$client->update($request->all());
        return response()->json($client,200);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('admin.client.index');
       /* $client->delete();
        return response()->json(null,204);*/
    }
}
