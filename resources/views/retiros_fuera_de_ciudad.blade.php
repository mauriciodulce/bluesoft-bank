<h1>Retiros Fuera de la Ciudad</h1>

<table>
    <thead>
        <tr>
            <th>Número de Cuenta</th>
            <th>Total Retiros</th>
        </tr>
    </thead>
    <tbody>
        @foreach($retiros as $retiro)
        <tr>
            <td>{{ $retiro->numero_cuenta }}</td>
            <td>{{ $retiro->total_retiros }}</td>
        </tr>
        @endforeach
    </tbody>
</table>