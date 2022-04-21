@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>{{$pizza->name}}</h1>

                <div><strong>Prezzo: </strong> {{$pizza->price}} </div>
                <div><strong>Slug: </strong> {{$pizza->slug}} </div>

                <a href="{{url()->previous()}}" class="btn btn-primary">Torna indietro</a>

            </div>
        </div>
    </div>
@endsection