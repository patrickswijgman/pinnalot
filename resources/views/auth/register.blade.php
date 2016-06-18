@extends('clean')

@section('header')
    {{ Html::style('css/datetimepicker.css') }}

    {{ Html::script('js/moment.min.js') }}
    {{ Html::script("js/datetimepicker.js") }}
@stop

@section('clean-content')
    <div style="text-align: center">
        <div class="mdl-layout__header ">
            <h2>
                {{Html::image('img/fav.png', null, ['width'=>'75px', 'height'=>'75px'])}} Pinnalot
            </h2>
        </div>
        <h3>Register</h3>
        <hr>
        {{ Form::open(array('url' => url('/register'))) }}
        {{ csrf_field() }}

        {{ MdlForm::showAllErrors($errors) }}

        {{ MdlForm::email('email', 'E-Mail Address') }}

        {{ MdlForm::text('name', 'Username') }}

        {{ MdlForm::password('password', 'Password') }}

        {{ MdlForm::password('password_confirmation', 'Confirm Password') }}

        {{ MdlForm::text('firstname', 'Firstname') }}

        {{ MdlForm::text('lastname', 'Lastname') }}

        {{ MdlForm::date('birthday', 'Birthday') }}

        {{ MdlForm::dropdown('country', 'Country', $countries, true) }}

        {{  MdlForm::submit('Register') }}
        <br>
        {{ link_to('/login', 'If you already got an account, click here to login.')}}
        {{ Form::close() }}
    </div>
@endsection