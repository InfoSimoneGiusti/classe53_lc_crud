@extends('layouts.base')

@section('pageTitle', 'Formati di pasta')


@section('content')

    <div class="container">

        <h1>Lista dei formati</h1>

        <a class="btn btn-warning" href="{{ route('pasta.create') }}" role="button">Crea nuovo formato di pasta</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Tempo Cottura</th>
                <th scope="col">Peso</th>
                <th scope="col">Azioni</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($pastas as $pasta)
                    <tr>
                        <td>{{$pasta->id}}</td>
                        <td>{{$pasta->title}}</td>
                        <td>{{$pasta->type}}</td>
                        <td>{{$pasta->cooking_time}}</td>
                        <td>{{$pasta->weight}}</td>

                        <td class="d-flex
                        ">
                            <a class="btn btn-primary" href="{{ route('pasta.show', $pasta->id ) }}" role="button">Vedi</a>
                            <a class="btn btn-warning" href="{{ route('pasta.edit', $pasta->id ) }}" role="button">Modifica</a>

                            <form method="POST" action="{{route('pasta.destroy', ['pastum' => $pasta->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
