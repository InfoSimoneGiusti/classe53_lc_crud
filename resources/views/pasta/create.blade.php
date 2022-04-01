@extends('layouts.base')

@section('pageTitle', 'Crea formato di pasta')

@section('content')

    <div class="container">

        <h1>Nuovo formato di pasta</h1>

        <form method="POST" action="{{ route('pasta.store') }}">

            @csrf

            <div class="mb-3">
                <label for="src" class="form-label" >Indirizzo immagine</label>
                <input required type="text" class="form-control" id="src" name="src" value="https://www.miosito.it">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label" >Nome del formato</label>
                <input type="text" class="form-control" id="title" name="title" value="Pippo">
            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <select class="form-select" id="type" name="type">
                        <option selected value="lunghe">Lunghe</option>
                        <option value="corte">Corte</option>
                        <option value="cortissime">Cortissime</option>
                    </select>
                    <label for="floatingSelect">Formato</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="cooking_time" class="form-label" >Tempo di cottura</label>
                <input type="number" class="form-control" id="cooking_time" name="cooking_time" value="11">
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label" >Peso</label>
                <input type="number" class="form-control" id="weight" name="weight" value="500">
            </div>


            <div class="form-floating">
                <textarea class="form-control" placeholder="Descrizione" id="description" name="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis cum iste perferendis. Harum architecto, quod velit autem fugiat id inventore amet alias sed ipsum consequuntur iste tempora quia, facere placeat!</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>

        </form>

    </div>




@endsection
