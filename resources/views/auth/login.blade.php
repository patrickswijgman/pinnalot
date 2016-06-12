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

        {{ MdlForm::email('email', 'E-Mail Address') }}
        {{ MdlForm::showErrors($errors, 'email') }}

        {{ MdlForm::password('password', 'Password') }}
        {{ MdlForm::showErrors($errors, 'password') }}

        {{  MdlForm::submit('Login') }}
        <br>
        {{ link_to('password/reset', ' Forgot your password?')}}
        {{ Form::close() }}
    </div>
@endsection


