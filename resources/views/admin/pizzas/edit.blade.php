@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Modifica {{$pizza->name}}</h1>
                <h3>Slug: {{$pizza->slug}}</h3>
                {{-- Form modifica pizza --}}
                <form method="POST" action="{{route('admin.pizzas.update', $pizza->id)}}" enctype="multipart/form-data">
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

                    {{-- gestione inserimento immagine --}}
                    <h3 class="mt-2">Immagine precedente</h3>
                    @if ($pizza->image)
                        <div class="px-0 py-2">
                            <img src="{{ asset('storage/' . $pizza->image) }}" alt="" class="img-fluid w-25">
                        </div>
                    @else
                        <p>Nessuna immagine precedentemente inserita nel DataBase</p>
                    @endif

                    <div class="form-group">
                        <label for="imageFile">Inserisci una immagine</label>
                        <input type="file" name="imageFile" id="imageFile">
                    </div>

                    @foreach ($tags as $tag)
        
                        <div class="custom-control custom-checkbox">
                            <input name="tags[]" type="checkbox" class="custom-control-input" id="tag_{{$tag->id}}" value={{$tag->id}} {{($pizza->tags->contains($tag->id) || in_array($tag->id, old('tags', []))) ? "checked" : ""}}> 
                            <label class="custom-control-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                    
                    @endforeach

                    <button type="submit" class="btn btn-primary my-2">Modifica</button>

                </form>
                <a href="{{url()->previous()}}" class="btn btn-secondary">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection
