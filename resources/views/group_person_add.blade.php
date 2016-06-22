@extends('layout')

@section('content')

  @if (!empty($results))
      {{ Form::open(array('url' => url('/group/'.$group->id.'/add'))) }}
      {{ csrf_field() }}

      {{ MdlForm::showAllErrors($errors) }}

      <div class = 'candidates-list'>
          <ul class="demo-list-control mdl-list">
                  <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons  mdl-list__item-avatar">person</i>
                {{ $users->firstname . ' ' . $users->lastname }}
            </span>
            <span class="mdl-list__item-secondary-action">
              <label class="list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="list-option-1">
                <input type="radio" id="list-option-1" class="mdl-radio__button" name="candidate_radio" value="{{$users->id}}" checked />
              </label>
            </span>
                  </li>
          </ul>
      </div>

      {{MdlForm::submit('Add')}}
      {{ Form::close() }}
  @else
    No users found.
  @endif

@endsection
