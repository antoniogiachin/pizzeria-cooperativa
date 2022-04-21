@extends('admin.layouts.base')

@section('content')

<div class="container">
    <table class="table">

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefono</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Pizza</th>
            <th scope="col">Messaggio</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td><a href="{{route('admin.orders.show', $order->id)}}">{{$order->name}}</a></td>
                    <td>{{$order->number}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->pizzaSelected}}</td>
                    <td>{{$order->message}}</td>
                    <td class="d-flex">    
                        <a href="{{route('admin.orders.show', $order->id)}}" class="btn btn-primary m-2">View</a>

                        <form method="POST" action="{{route('admin.orders.destroy', $order->id)}}">
                        
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger m-2">
                                    FATTO
                                </button>
                        
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection