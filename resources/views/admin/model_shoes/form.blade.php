<div class="row mB-40">
        <div class="col-sm-8">
            <div class="bgc-white p-20 bd">
                {!! Form::myInput('text', 'name', 'Username') !!}

                    {!! Form::myInput('password', 'password_confirmation', 'Password again') !!}

                    {!! Form::mySelect('category', $brands[0]->id,null, ['class' => 'form-control select2']) !!}

                    {!! Form::myFile('photo', 'Fotografia') !!}

                    {!! Form::myTextArea('bio', 'Bio') !!}
            </div>
        </div>
    </div>
