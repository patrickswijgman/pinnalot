@extends('clean')

@section('clean-content')
    <div style="text-align: center">
        <div class="mdl-layout__header ">
            <h2>
                {{Html::image('img/fav.png', null, ['width'=>'75px', 'height'=>'75px'])}} Pinnalot
            </h2>
        </div>
        <h3>Login</h3>
        <hr>
        {{ Form::open(array('url' => url('/login'))) }}
        {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{  MdlForm::text('email', 'E-mail Address', old('email')) }}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        {{ MdlForm::showAllErrors($errors) }}

        {{ MdlForm::email('email', 'E-Mail Address') }}

            <div class="form-group">
                <br>
                {{  MdlForm::submit('login', 'Login') }}
                <br>
                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                <br>
                <br>
                <a class="btn btn-link" href="{{ url('/register') }}">If you don't have an account? Click here to register.</a>
            </div>
        {{ MdlForm::password('password', 'Password') }}

        {{  MdlForm::submit('Login') }}
        <br>
        {{ link_to('password/reset', ' Forgot your password?')}}
        {{ Form::close() }}
    </div>
@endsection


