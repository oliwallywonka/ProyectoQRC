<?php

namespace App\Http\Controllers;

use App\Model_shoe;
use App\Category;
use App\Brand;
use App\Shoes;
use App\Color;
use App\Size;

use Barryvdh\DomPDF\Facade;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $request->validate([
            'id_brand' =>'required',
            'id_category' => 'required',
            'model' => 'required|alpha',
            'ref_price' =>'required|numeric',
            'photo' => 'required|image'
        ]);

        $model_shoe = new Model_shoe;

        $model_shoe->id_brand = $request->id_brand;
        $model_shoe->id_category = $request->id_category;
        $model_shoe->model = $request->model;
        $model_shoe->ref_price = $request->ref_price;
        //$file = $request->file('photo')->getClientOriginalName();
        $file = $request->file('photo')->getClientOriginalName();
        $image =$request->file('photo')->storeAs('model_image',$file);
        $model_shoe->photo = $image;
        $model_shoe->photo = $file;
        $model_shoe->save();

        $model_shoe = Model_shoe::all()->last();

        $qr= QrCode::size(500)
                    ->format('png')
                    ->generate("http://127.0.0.1:8000/admin/shoes/$model_shoe->id",
                    public_path('images/model_images/qrcode'.$model_shoe->id.'.png'));
        //$qr_code = $qr->store('model_image');


        $model_shoe->qr_code = $qr;
        $model_shoe->save();




        return redirect()->route('admin.model_shoes.index')->with('success','Modelo Creado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model_shoe  $model_shoe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model_shoes = Model_shoe::with('category','brand')
                                  ->where('id',$id)
                                  ->get();
        $pdf = \PDF::loadView('admin.model_shoes.qrpdf',[
                             'model_shoes' =>$model_shoes
                             ])->setPaper('A5');

        return $pdf->stream();
        //return ($model_shoes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model_shoe  $model_shoe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $model_shoes = Model_shoe::find($id);
        return view('admin.model_shoes.edit',[
                    
                    'model_shoes' => $model_shoes,
                    'categories' => $categories,
                    'brands' => $brands
        ]);
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
    public function destroy($id)
    {
        $model_shoe = Model_Shoe::find($id);

        $shoes = Shoes::where('id_model_shoe' ,$id)->get();

        Storage::delete('model_image/'.$model_shoe->photo);

        if($shoes == '[]'){

            \File::delete('images/model_imager/qrcode'.$model_shoe->id.'.png');

            $model_shoe->delete();

        }else{

            foreach($shoes as $s){

                $ids[]=$s->id;
                Storage::delete('shoe_image/'.$s->photo);

            }

            $delete = Shoes::destroy($ids);

            \File::delete('images/model_images/qrcode'.$model_shoe->id.'.png');

            $model_shoe->delete();

        }





        return redirect()->route('admin.model_shoes.index')->with('success','Elemento eliminado exitosamente');

        //return ($id);

    }


}
