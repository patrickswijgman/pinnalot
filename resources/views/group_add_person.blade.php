@extends('layout')

@section('content')

  @if ($user->isEmpty())
   User not found
  @else
    @foreach($user as $candidate)
      {{ $candidate->firstname . ' ' . $candidate->lastname }}
      @endforeach
  @endif


  {{MdlForm::submit('Add')}}

@endsection
