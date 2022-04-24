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

                    <div class="d-flex">


                        {{-- gestione inserimento categoria --}}
                        <div class="form-group">

                            <label for="category_id">Categoria</label>
                            <select class="form-control" id="category_id" name="category_id">
        
                            <option value="">Nessuna categoria</option>
                            @foreach ($categories as $category )    
                                <option {{old("category_id") == $category->id ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        
                            </select>
        
                        </div>


                        {{-- parte sinistra --}}
                        <div class="mr-4">
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
                        </div>
    
                        {{-- parte destra --}}
                        <div class="ml-4">
    
                            {{-- gestione inserimento tags --}}
                            @foreach ($tags as $tag)
                                <div class="form-check">
                                    <input name="tags[]" class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag_{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? "checked" : ""}}>
                                    <label class="form-check-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
                                </div>
                            @endforeach 
    
                        </div>


                    </div>

                    <button type="submit" class="btn btn-primary my-2">Aggiungi</button>

                </form>
                <a href="{{url()->previous()}}" class="btn btn-secondary">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection