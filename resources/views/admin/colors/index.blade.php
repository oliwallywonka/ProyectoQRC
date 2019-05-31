@extends('admin.default')

@section('page-header')
    COLORES <small>{{ trans('app.manage') }}</small>
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
                    <th>ID</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($colors as $item)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.colors.edit', $item->id) }}">{{ $item->id }}</a></td>
                        <td>{{ $item->color }}</td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route(ADMIN . '.colors.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.colors.destroy', $item->id),
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
                  <h4 class="modal-title">Añadir color</h4>
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                    <form action="{{route('admin.colors.store')}}" method="POST">
                        @csrf
                        <label class=" form-control-label" for="color">Color input</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class=""></i></div>
                            <input class="form-control" name="color" type="text">
                        </div>
                        <small class="form-text text-muted">ex. Verde</small>

                        <button type="submit" class="btn btn-primary" ><i class="fa fa-envolve-0"></i>&nbsp; Guardar</button>


                    </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
