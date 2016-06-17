@extends('layout')

@section('content')

  <!-- List with avatar and controls -->
  <style>
    .demo-list-radio {
      display: inline;
    }
  </style>

  @if ($user->isEmpty())
   User not found
  @else
    <div class = 'candidates-list'>
    <ul class="demo-list-control mdl-list">
    @foreach($user as $candidate)
        <li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
      <i class="material-icons  mdl-list__item-avatar">person</i>
      {{ $candidate->firstname . ' ' . $candidate->lastname }}
    </span>
      <span class="mdl-list__item-secondary-action">
        <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="list-option-1">
          <input type="radio" id="list-option-1" class="mdl-radio__button" name="options" value="1" checked />
        </label>
    </span>
        </li>

      @endforeach
    </div>
  @endif

  {{MdlForm::submit('Add')}}

@endsection
