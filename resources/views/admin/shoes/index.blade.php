@extends('admin.default')

@section('page-header')
    ZAPATOS<small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a  data-target="#modal-add" data-toggle="modal" class="btn btn-info">
            AÑADIR
        </a>
    </div>


    <div class="container-fluid">
        <div class="row">



            @foreach ($shoes as $s)
                <div class="col-3">
                    <div class="bgc-white bd bdrs-3p p-20 mB-20">
                        <div class="peer mR-10">
                            <img  class=" bdrs-3p col col-12" src="/storage/shoe_image/{{$s[0]->photo}}" alt="">
                        </div>

                        <div>Color: {{$s[0]->color->color}}</div>
                        <div>Precio de Referencia: {{$s[0]->model_shoes->ref_price}} Bs.</div>
                        <div>Tallas: </div>

                        @foreach ($s as $item=>$n)
                                 <div>{{ $n->size->size}}</div>
                        @endforeach

                        <div class="peer ">
                            <div class="row">
                                <a href="" class="btn cur-p btn-outline-primary col col-6">Editar</a>
                                {!! Form::open([
                                    'class'=>'delete col col-6',
                                    'url'  => route(ADMIN . '.shoes.destroy',$s),
                                    'method' => 'DELETE',
                                    ])
                                !!}

                                    <button class="btn cur-p btn-outline-danger col-12" >Eliminar</button>

                                {!! Form::close() !!}
                            </div>

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
                      <h4 class="modal-title">Añadir Zapato</h4>
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                        <form action="{{route('admin.shoes.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_model_shoe" value="{{$id_model_shoe}}">


                            <label class=" form-control-label" for="color">DESCRIPCIÓN</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class=""></i></div>
                                <input class="form-control" name="description" type="int">
                            </div>
                            <small class="form-text text-muted">ex. Color limitado</small>

                            <div class="group-material">
                                    <span>COLORES</span>
                                    <select name="id_color" class="form-control select2" data-toggle="tooltip" data-placement="top" title="Elige una marca">
                                        <option value="" disabled="" selected="">Selecciona una Color</option>
                                            @foreach ($colors as $c)
                                                <option value="{{$c->id}}" >{{$c->color}}</option>
                                            @endforeach

                                    </select>
                            </div>

                                    <span>TALLAS</span>
                                    <div class="container">
                                            <div class="row">
                                                @foreach ($sizes as $s)
                                                    <label class="form-check-label col-6">
                                                        <input name="id_size[]" value="{{$s->id}}" class="form-check-input" type="checkbox"> {{$s->size}}
                                                    </label>
                                                @endforeach
                                            </div>
                                    </div>



                            <br>
                            <div class="group-material">
                                    <span>Fotografia</span>
                                    <input type="file" name="photo">
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
