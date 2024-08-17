@extends('layout')

@section('content')
<h1>Movimientos Recientes</h1>

@if(isset($error))
<p>{{ $error }}</p>
@endif

<form action="{{ route('cuentas.movimientos') }}" method="GET">
    <label for="numero">Número de Cuenta:</label>
    <input type="text" id="numero" name="numero">
    <button type="submit">Consultar</button>
</form>

@if(isset($transacciones))
<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Monto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transacciones as $transaccion)
        <tr>
            <td>{{ $transaccion->created_at }}</td>
            <td>{{ $transaccion->tipo_transaccion }}</td>
            <td>{{ $transaccion->monto }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection