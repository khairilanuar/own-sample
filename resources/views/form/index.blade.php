@extends('main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Negeri</th>
            <th>Daerah</th>
            <th>Parlimen</th>
            <th>Dun</th>
            <th>Nama</th>
            <th>ID No.</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($forms as $form)
        <tr>
            <td></td>
            <td>{{$form->state->name}}</td>
            <td>{{$form->district->name}}</td>
            <td>{{$form->parliament->name}}</td>
            <td>{{$form->dun->name}}</td>
            <td>{{$form->name}}</td>
            <td>{{$form->identification_no}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
