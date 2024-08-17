@extends('layout')

@section('content')
<h1>Consultar Saldo</h1>

@if(isset($status))
<p>{{ $status }}</p>
@endif

@if(isset($error))
<p>{{ $error }}</p>
@endif

<form action="{{ route('cuentas.consultar') }}" method="GET">
    <label for="numero">Número de Cuenta:</label>
    <input type="text" id="numero" name="numero">
    <button type="submit">Consultar</button>
</form>

@if(isset($saldo))
<p>Saldo: {{ $saldo }}</p>
@endif

<h2>Consignar</h2>
<form action="{{ route('cuentas.consignar') }}" method="POST">
    @csrf
    <label for="numero">Número de Cuenta:</label>
    <input type="text" id="numero" name="numero">
    <label for="monto">Monto:</label>
    <input type="number" id="monto" name="montno" step="0.01">
    <button type="submit">Consignar</button>
</form>

<h2>Retirar</h2>
<form action="{{ route('cuentas.retirar') }}" method="POST">
    @csrf
    <label for="numero">Número de Cuenta:</label>
    <input type="text" id="numero" name="numero">
    <label for="monto">Monto:</label>
    <input type="number" id="monto" name="monto" step="0.01">
    <button type="submit">Retirar</button>
</form>
@endsection