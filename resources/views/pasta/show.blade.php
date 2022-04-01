@extends('layouts.base')

@section('pageTitle')
    {{$pastum->title}}
@endsection


@section('content')

    <div class="container">
        <h1>{{$pastum->title}}</h1>
        <div><strong>Tipo:</strong> {{$pastum->type}}</div>
        <div><strong>Tempo di cottura:</strong> {{$pastum->cooking_time}}</div>
        <div><strong>Peso:</strong> {{$pastum->weight}}</div>
        <div><strong>Descrizione:</strong> {!! $pastum->description !!}</div>

        <a class="btn btn-primary mt-5" href="{{route('pasta.index')}}" role="button">Torna alla lista</a>

    </div>



@endsection
