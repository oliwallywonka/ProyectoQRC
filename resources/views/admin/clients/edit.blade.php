@extends('admin.default')

@section('page-header')
	MARCA <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::model($item, [
			'action' => ['ClientController@update', $item->id],
			'method' => 'put',
			'files' => true
		])
	!!}

		@include('admin.clients.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>

	{!! Form::close() !!}

@stop
