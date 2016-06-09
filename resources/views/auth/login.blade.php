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

            {{  MdlForm::text('email', 'E-Mail Address', old('email')) }}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            {{  MdlForm::text('password', 'Password', '', 'password') }}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <div id="select-container" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="select" name="select" readonly />
                <label class="mdl-textfield__label" for="select">Select your option</label>
            </div>

            <br>
            {{  MdlForm::submit('login', 'Login') }}
            <br>
            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
        {{ Form::close() }}
    </div>
@endsection

@section('footer')

    {{ Html::script('js/dropdown.js') }}

    <script>
        $("#select").mdlselect({
            value: ["0", "1", "2", "3"],
            label: ["n/a", "Option 1", "Option 2", "Option 2"],
        });
    </script>

@stop
