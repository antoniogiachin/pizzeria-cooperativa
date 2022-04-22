@extends('admin.layouts.base')

@section('content')

    <div class="container">
        <h1 class="text-center mb-5">Tabella dei tag </h1>

        <a href="{{ route('admin.tags.create')}}" class="btn btn-warning mb-4">Crea tag</a>
       
        <table class="table">
            
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            
            <tbody>
               
              @foreach ($tags as $tag )
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td class="d-flex gap-1">
                      
                      <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-success mr-4">Vedi</a>
                     
                      <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning mr-4">Modifica</a>
                     
                      <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST">
                        @csrf

                        @method('DELETE')

                        <button class="btn btn-danger delete">Elimina</button>
                      </form>
                    </td>  
                </tr>
              @endforeach  
            </tbody>
        </table>
    </div>
@endsection