@extends('layout')

@section('content')
<h1>Reporte de Transacciones por Mes</h1>

<form action="{{ route('reportes.transacciones_por_mes') }}" method="GET">
    <label for="mes">Mes:</label>
    <input type="number" id="mes" name="mes" min="1" max="12" required>
    <button type="submit">Generar Reporte</button>
</form>

@if(isset($transacciones))
<h2>Resultados</h2>
<table>
    <thead>
        <tr>
            <th>Número de Cuenta</th>
            <th>Total Transacciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transacciones as $transaccion)
        <tr>
            <td>{{ $transaccion->numero_cuenta }}</td>
            <td>{{ $transaccion->total_transacciones }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection