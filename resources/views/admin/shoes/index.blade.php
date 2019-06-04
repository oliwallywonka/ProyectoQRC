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

            <div class="col-3">
                <div class="bgc-white bd bdrs-3p p-20 mB-20">
                    <div class="peer mR-10">
                        <img  class=" bdrs-3p col col-12" src="/images/tienda2.jpg" alt="">
                    </div>

                    <div>Modelo:</div>
                    <div>Precio de Referencia:</div>
                    <div>Marca:</div>
                    <div>Categoria:</div>
                    <div class="peer">

                        <a href="" class="btn cur-p btn-outline-info col col-12">Tallas y Colores</a>
                        <a href="" class="btn cur-p btn-info col col-12">Imprimir Qr</a>

                    </div>
                </div>
            </div>

            @foreach ($shoes as $s)

            <div class="col-3">
                    <div class="bgc-white bd bdrs-3p p-20 mB-20">
                        <div class="peer mR-10">
                            <img  class=" bdrs-3p col col-12" src="/images/tienda2.jpg" alt="">
                        </div>

                        <div>Color: {{$s->color->color}}</div>
                        <div>Precio de Referencia: {{$m->ref_price}} Bs.</div>
                        <div>Tallas: </div>
                        @foreach ($s->size as $si)
                            <div>{{$si->size}}</div>
                        @endforeach

                        <div class="peer">

                            <a href="{{ route('admin.shoes.index',$m->id) }}" class="btn cur-p btn-outline-info col col-12">Tallas y Colores</a>
                            <a href="" class="btn cur-p btn-info col col-12">Imprimir Qr</a>

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
                        <form action="{{route('admin.shoes.store')}}" method="POST">
                            @csrf
                            <label class=" form-control-label" for="color">Zapatos</label>
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
                                                        <input name="id_size" value="{{$s->id}}" class="form-check-input" type="checkbox"> {{$s->size}}
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
