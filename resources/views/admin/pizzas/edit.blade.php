@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Modifica {{$pizza->name}}</h1>
                <h3>Slug: {{$pizza->slug}}</h3>
                {{-- Form modifica pizza --}}
                <form method="POST" action="{{route(admin.pizzas.update, $pizza->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" placeholder="Nome" value="{{old('name', $pizza->name)}}">
                    </div>

                    <div class="form-group">
                        <label for="price">Prezzo</label>
                        <input type="number" name="price" id="price" step=".01" value="{{old('price', $pizza->price)}}">
                    </div>

                    <button type="submit" class="btn btn-primary"></button>

                </form>
                <a href="{{url()->previous()}}" class="btn btn-primary">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection