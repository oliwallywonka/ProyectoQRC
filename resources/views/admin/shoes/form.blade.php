<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'description', 'Descripción') !!}

				{!! Form::myInput('password', 'password', 'Password') !!}

				{!! Form::myOption('password', 'password_confirmation', 'Password again') !!}

				{!! Form::mySelect('role', 'Role', config('variables.role'), null, ['class' => 'form-control select2']) !!}

				{!! Form::myFile('photo', 'Fotografia') !!}
		</div>
	</div>
</div>
