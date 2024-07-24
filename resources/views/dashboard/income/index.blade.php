@extends('dashboard.master')
@section('titulo','Ingreso')
@include('layouts/navigation')
@section('contenido')
<div class="container py-4">
<h1>Ingresos</h1>
<br>
<a href="{{url('dashboard/income/create')}}" class="btn btn-primary btn-sm">Nuevo Ingreso</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Id Ingreso</th>
            <th>Proveedor</th>
            <th>Usuario</th>
            <th>Tipo</th>
            <th>Serie</th>
            <th>Número</th>
            <th>Fecha</th>
            <th>Impuesto</th>
            <th>Total</th>
            <th>Status</th>
            <th>FechaCreación</th>
            <th>FechaActualización</th>
            <th>Detalle de ingreso</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
         @foreach($income as $income) 
        <tr>
            <td scope="row">{{$income->id}}</td>
            <td>{{$income->provider_id}}</td>
            <td>{{$income->user_id}}</td>
            <td>{{$income->receipt_type}}</td>
            <td>{{$income->receipt_series}}</td>
            <td>{{$income->receipt_number}}</td>
            <td>{{$income->date}}</td>
            <td>{{$income->tax}}</td>
            <td>{{$income->total}}</td>
            <td>{{$income->status}}</td>
            <td>{{$income->created_at}}</td>
            <td>{{$income->updated_at}}</td>
            <td><a href="{{url('dashboard/income/'.$income->id.'/detalle')}}"class="bi bi-pencil"></a>
            </td>
            <td><a href="{{url('dashboard/income/'.$income->id.'/edit')}}"class="bi bi-pencil"></a>
            </td>
            <td>
            <form action="{{url('dashboard/income/'.$income->id)}}"method="post">
                @method("DELETE")
                @csrf
                <button class="bi bi-eraser-fill" type="submit"></button>
            </form>  
            </td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

