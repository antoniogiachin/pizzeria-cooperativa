@extends('admin.layouts.base')

@section('content')

<div class="container">
    <table class="table">

        <a href="{{route('admin.pizzas.create')}}" class="btn btn-warning mb-3">Create new pizza</a>
        
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