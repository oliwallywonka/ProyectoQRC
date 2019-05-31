@extends('admin.default')

@section('page-header')
	MAYORISTAS<small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::model($item, [
			'action' => ['WholesellerController@update', $item->id],
			'method' => 'put',
			'files' => true
		])
	!!}

		@include('admin.wholesellers.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>

	{!! Form::close() !!}

@stop
