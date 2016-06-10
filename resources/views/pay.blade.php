@extends('layout')



@section('content')


    <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp" algin="center">
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="mdl-data-table__cell--non-numeric">Patrick</td>
            <td>30 euro</td>
            <td>Gift</td>
        </tr>
        </tbody>
    </table>
    <br><br>

    {{ MdlForm::submit('add', 'Add') }}
    <br><br>

    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" algin="center">
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Name</th>
            <th>Paid</th>
            <th>Payment</th>
        </tr>
        </thead>
        <body>
        <tr>
            <td class="mdl-data-table__cell--non-numeric">Patrick</td>
            <td>30 euro</td>
            <td>+ 20 euro</td>
        </tr>
        <tr>
            <td class="mdl-data-table__cell--non-numeric">Thijs</td>
            <td>0 euro</td>
            <td>- 10 euro</td>
        </tr>
        <tr>
            <td class="mdl-data-table__cell--non-numeric">Frank</td>
            <td>0 euro</td>
            <td>- 10 euro</td>
        </tr>
        </body>
    </table>

<br>
    {{ MdlForm::submit('paid', 'Paid') }}


@stop
