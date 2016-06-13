@extends('clean')

@section('clean-content')
    <div style="text-align: center">

        <div class="mdl-layout__header ">
            <h2>
                {{Html::image('img/fav.png', null, ['width'=>'75px', 'height'=>'75px'])}} Pinnalot
            </h2>
        </div>
        <h3>Reset password</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <hr>
        {{ Form::open(array('url' => url('/password/email'))) }}
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {{  MdlForm::text('email', 'E-mail Address', old('email')) }}
            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group">
            <br>
            {{  MdlForm::submit('send_password_reset_link', 'Send Password Reset Link') }}
            <br>
        </div>
        {{ Form::close() }}
    </div>
@endsection
