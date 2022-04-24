@extends('admin.layouts.base')

@section('content')

<div class="container">
    <table class="table">

       <div class="d-flex justify-content-between">
            <a href="{{route('admin.pizzas.create')}}" class="btn btn-warning mb-3">Create new pizza</a>

            {{-- filtro categoria --}}
            <form method="GET" action="{{route('admin.pizzas.index')}}">

                @csrf

                <div class="d-flex align-items-center">

                    <select class="form-control" id="category_id" name="category_id">

                        <option value="">Tutte le categorie</option>
                        @foreach ($categories as $category )    
                            <option {{$categoryId == $category->id ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                
                    </select>

                    <button type="submit" class="btn btn-primary ml-3">Cerca</button>
                </div>
            </form>
       </div>
       
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pizza</th>
            <th scope="col">Price</th>
            <th scope="col">Slug</th>
            <th scope="col">Category</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($pizzas as $pizza)
                <tr>
                    <td>{{$pizza->id}}</td>
                    <td><a href="{{route('admin.pizzas.show', $pizza->id)}}">{{$pizza->name}}</a></td>
                    <td>{{$pizza->price}}</td>
                    <td>{{$pizza->slug}}</td>
                    <td>{{isset($pizza->category) ? $pizza->category->name : "NULL"}}</td>
                    <td class="d-flex">    
                        <a href="{{route('admin.pizzas.show', $pizza->id)}}" class="btn btn-primary m-2">View</a>
                        <a href="{{route('admin.pizzas.edit', $pizza->id)}}" class="btn btn-secondary m-2">Edit</a>

                        <form method="POST" action="{{route('admin.pizzas.destroy', $pizza->id)}}">
                        
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger m-2">DELETE</button>
                        
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection