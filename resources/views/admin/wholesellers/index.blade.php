@extends('admin.default')

@section('page-header')
    MAYORISTAS <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a  class="btn btn-info" data-toggle="modal" data-target="#modal-add">
            AÑADIR
        </a>
    </div>


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Nº de Cédula</th>
                    <th>Celular</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                   <th>Nombre</th>
                   <th>Nº de Cédula</th>
                   <th>Celular</th>
                   <th>Actions</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($wholesellers as $item)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.wholesellers.edit', $item->id) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->ci }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route(ADMIN . '.wholesellers.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.wholesellers.destroy', $item->id),
                                        'method' => 'DELETE',
                                        ])
                                    !!}

                                        <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>

                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

     {{-- Modal añadir --}}
    <div class="modal inmodal" id="modal-add" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                      <h4 class="modal-title">Añadir Mayorista</h4>
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                        <form action="{{route('admin.wholesellers.store')}}" method="POST">
                            @csrf
                            <label class=" form-control-label" for="color">NOMBRE</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class=""></i></div>
                                <input class="form-control" name="name" type="text">
                            </div>
                            <small class="form-text text-muted">ex. ALEX CHURA</small>

                            <label class=" form-control-label" for="color">Nº de Cedula</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class=""></i></div>
                                <input class="form-control" name="ci" type="text">
                            </div>
                            <small class="form-text text-muted">ex. 984654</small>

                            <label class=" form-control-label" for="color">Nº de Celular </label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class=""></i></div>
                                <input class="form-control" name="phone" type="text">
                            </div>
                            <small class="form-text text-muted">ex. 6978451</small>



                            <button type="submit" class="btn btn-primary" ><i class="fa fa-envolve-0"></i>&nbsp; Guardar</button>


                        </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
