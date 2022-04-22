@extends ("admin.layouts.base")

@section("content")
    <div class="container">
    
                <a href="{{route('admin.categories.create')}}" class="btn btn-primary my-3">Crea una categoria</a>

                <table class="table">

                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $category )
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td class="d-flex gap-1">
                                
                                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-success mr-4">Vedi</a>
                                
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning mr-4">Modifica</a>
                                
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
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