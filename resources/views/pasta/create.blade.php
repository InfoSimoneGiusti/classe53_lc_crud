@extends('layouts.base')

@section('pageTitle', 'Crea formato di pasta')

@section('content')

    <div class="container">

        <h1>Nuovo formato di pasta</h1>

        <form method="POST" action="{{ route('pasta.store') }}">

            @csrf

            <div class="mb-3">
                <label for="src" class="form-label" >Indirizzo immagine</label>
                <input type="text" class="form-control" id="src" name="src" value="{{old('src')}}" required>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label" >Nome del formato</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <select class="form-select" id="type" name="type">
                        <option {{(old('type') == 'lunghe') ? 'selected' : ''}} value="lunghe">Lunghe</option>
                        <option {{(old('type') == 'corte') ? 'selected' : ''}} value="corte">Corte</option>
                        <option {{(old('type') == 'cortissime') ? 'selected' : ''}} value="cortissime">Cortissime</option>
                    </select>
                    <label for="floatingSelect">Formato</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="cooking_time" class="form-label" >Tempo di cottura</label>
                <input type="number" class="form-control" id="cooking_time" name="cooking_time" value="{{old('cooking_time')}}" required>
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label" >Peso</label>
                <input type="number" class="form-control" id="weight" name="weight" value="{{old('weight')}}" required>
            </div>


            <div class="form-floating">
                <textarea class="form-control" placeholder="Descrizione" id="description" name="description" required>
                    {{old('description')}}
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>

        </form>

    </div>




@endsection
