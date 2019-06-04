@extends('admin.default')

@section('page-header')
	User <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'action' => ['ModelShoeController@store'],
			'files' => true
		])
	!!}

		@include('admin.model_shoes.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>

	{!! Form::close() !!}

@stop
