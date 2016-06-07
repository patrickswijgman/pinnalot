@extends('clean')

@section('clean-content')
    <dialog class="mdl-dialog">
        <h4 class="mdl-dialog__title">{{ $event->title }}</h4>
        <div class="mdl-dialog__content">
            <p>{{ $event->description }}</p>

            <br/>
            <p><strong>From</strong></p>
            <p>{{ $event->start }}</p>
            <p><strong>Till</strong></p>
            <p>{{ $event->end }}</p>
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close">Close</button>
        </div>
    </dialog>
@stop