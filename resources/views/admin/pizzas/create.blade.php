@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Aggiungi Pizza</h1>

                {{-- Form creazione pizza --}}
                <form method="POST" action="{{route('admin.pizzas.store')}}" enctype="multipart/form-data">
                    {{-- token sicurezza --}}
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" placeholder="Nome" value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="price">Prezzo</label>
                        <input type="number" name="price" id="price" step=".01" value="{{old('price')}}">
                    </div>

                    {{-- gestione inserimento immagine --}}
                    <div class="form-group">
                        <label for="imageFile">Inserisci una immagine</label>
                        <input type="file" name="imageFile" id="imageFile">
                    </div>

                    <button type="submit" class="btn btn-primary my-2">Aggiungi</button>

                </form>
                <a href="{{url()->previous()}}" class="btn btn-secondary">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection
