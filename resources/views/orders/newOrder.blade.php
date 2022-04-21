{{--Stile--}}

<style>
    table{
        border-collapse: collapse;
    }
      
    tr,
    th{
        border: 2px solid black;
        padding: 0.5rem 1rem;
    }
    
    td {
        padding: 0 0.25rem;
    }
    
</style>


{{-- TABELLA ORDINE --}}
<table>
    <tr>
        <th>Ordine N</th>
        <td>{{$order->id}}</td>
    </tr>
    <tr>
        <th>Nome</th>
        <td>{{$order->name}}</td>
    </tr>
    <tr>
        <th>Telefono</th>
        <td>{{$order->number}}</td>
    </tr>
    <tr>
        <th>Indirizzo</th>
        <td>{{$order->address}}</td>
    </tr>
    <tr>
        <th>Pizza</th>
        <td>{{$order->pizzaSelected}}</td>
    </tr>
    <tr>
        <td class="message">{{$order->message}}</td>
    </tr>
</table>

