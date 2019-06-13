
@extends('admin.default')

@section('page-header')
    MODELOS<small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a  data-target="#modal-add" data-toggle="modal" class="btn btn-info">
            AÑADIR
        </a>
    </div>


    <div class="container-fluid">
        <div class="row">



            @foreach ($model_shoes as $m)

            <div class="col-3">

                    <div class="bgc-white bd bdrs-3p p-20 mB-20">
                        <div class="peer ">
                            <div class="row">
                                <a href="{{route('admin.model_shoes.edit',$m->id)}}" class="btn cur-p btn-outline-primary col col-6">Editar</a>
                                {!! Form::open([
                                    'class'=>'delete col col-6',
                                    'url'  => route(ADMIN . '.model_shoes.destroy', $m->id),
                                    'method' => 'DELETE',
                                    ])
                                !!}

                                    <button class="btn cur-p btn-outline-danger col-12" onclick="return confirm('Esta seguro que desea eliminar este modelo y todas sus tallas y colores asociados')">Eliminar</button>

                                {!! Form::close() !!}
                            </div>

                        </div>
                        <br>
                        <div class="peer mR-10">
                            <img  class=" bdrs-3p col col-12" src="/storage/model_image/{{$m->photo}}" alt="">
                        </div>

                        <div>Modelo: {{$m->model}}</div>
                        <div>Precio de Referencia: {{$m->ref_price}} Bs.</div>
                        <div>Categoria: {{$m->brand->brand}}</div>
                        <div>Marca: {{$m->category->description}}</div>

                        <div class="peer">

                            <a href="{{ route('admin.shoes.show',$m->id) }}" class="btn cur-p btn-outline-primary col col-12">Tallas y Colores</a>
                            <a href="{{ route('admin.model_shoes.show',$m->id)}}" class="btn cur-p btn-primary col col-12">Imprimir Qr</a>

                        </div>
                    </div>
            </div>

            @endforeach

        </div>
    </div>

    {{-- Modal añadir --}}
    <div class="modal inmodal" id="modal-add" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                      <h4 class="modal-title">Añadir Modelo</h4>
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                        <form action="{{route('admin.model_shoes.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label class=" form-control-label" for="color">MODELOS</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class=""></i></div>
                                <input class="form-control" name="model" type="text">
                            </div>
                            <small class="form-text text-muted">ex. NIKE URBAN</small>

                            <label class=" form-control-label" for="color">PRECIO DE REFERENCIA</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class=""></i></div>
                                <input class="form-control" name="ref_price" type="int">
                            </div>
                            <small class="form-text text-muted">ex. 399</small>

                            <div class="group-material">
                                    <span>MARCAS</span>
                                    <select name="id_brand" class="form-control select2" data-toggle="tooltip" data-placement="top" title="Elige una marca">
                                        <option value="" disabled="" selected="">Selecciona una marca</option>
                                            @foreach ($brands as $b)
                                                <option value="{{$b->id}}" >{{$b->brand}}</option>
                                            @endforeach

                                    </select>
                            </div>

                            <div class="group-material">
                                    <span>CATEGORIAS</span>
                                    <select name="id_category" class="form-control select2" data-toggle="tooltip" data-placement="top" title="Elige una categoria">
                                        <option value="" disabled="" selected="">Selecciona una categoria</option>
                                            @foreach ($categories as $c)
                                                <option value="{{$c->id}}" >{{$c->description}}</option>
                                            @endforeach

                                    </select>
                            </div>


                            <br>
                            <div class="group-material">
                                    <span>Fotografia</span>
                                    <input type="file" name="photo" class="form_control">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" ><i class="fa fa-envolve-0"></i>&nbsp; Guardar</button>


                        </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
