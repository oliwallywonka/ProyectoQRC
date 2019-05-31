
@extends('admin.default')

@section('page-header')
    MODELOS<small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a href="{{ route(ADMIN . '.users.create') }}" class="btn btn-info">
            {{ trans('app.add_button') }}
        </a>
    </div>


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Codigo QR</th>
                    <th>Foto</th>
                    <th>Precio de Referencia</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Modelo</th>
                    <th>Codigo QR</th>
                    <th>Foto</th>
                    <th>Precio de Referencia</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($model_shoes as $item)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.shoes.edit', $item->id) }}">{{ $item->model }}</a></td>
                        <td>{{ $item->qr_code }}</td>
                        <td>{{ $item->ref_price }}</td>
                        <td>{{ $item->photo }}</td>
                        <td>{{ $item->brand->brand }}</td>
                        <td>{{ $item->category->description }}</td>

                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route(ADMIN . '.shoes.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.shoes.destroy', $item->id),
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

@endsection
