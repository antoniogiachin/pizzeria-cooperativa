@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>{{$pizza->name}}</h1>
                
                <strong>Categoria: </strong> {{isset($post->category) ? $post->category->name : "NULL"}}
                <div><strong>Prezzo: </strong> {{$pizza->price}} </div>
                <div><strong>Slug: </strong> {{$pizza->slug}} </div>
                <h3 class="mt-3">Immagine</h3>
                <div class="px-0 py-3">
                    @if ($pizza->image)
                        <img src="{{ asset('storage/' . $pizza->image) }}" alt="" class="img-fluid w-25">
                    @else
                        <p>Immagine non caricata sul Database</p>
                    @endif
                </div>

                <a href="{{url()->previous()}}" class="btn btn-primary">Torna indietro</a>

            </div>
        </div>
    </div>
@endsection
