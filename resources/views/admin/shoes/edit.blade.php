@extends('admin.default')

@section('page-header')
	Zapatos <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::model($s[0], [
			'action' => ['ShoesController@update', $s[0]->id],
			'method' => 'put',
			'files' => true
		])
	!!}

		@include('admin.shoes.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>

	{!! Form::close() !!}

@stop
