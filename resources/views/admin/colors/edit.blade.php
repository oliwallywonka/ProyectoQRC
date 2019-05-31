@extends('admin.default')

@section('page-header')
	MARCA <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::model($item, [
			'action' => ['ColorController@update', $item->id],
			'method' => 'put',
			'files' => true
		])
	!!}

		@include('admin.colors.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>

	{!! Form::close() !!}

@stop
