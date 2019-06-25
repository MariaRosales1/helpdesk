<table>
    <thead>
        @if (count($consultants) != 0)
            <tr>
                <td>Identificación</td>
                <td>Nombre</td>
                <td>Email</td>
            </tr>
        @endif
    </thead>
    <tbody>
        @forelse ($consultants as $consultant)
            <tr>
                <td>{{$consultant->identification}}</td>
                <td>{{$consultant->name}}</td>
                <td>{{$consultant->email}}</td>
            </tr>
        @empty
            <h1>No se encontraron asesores</h1>
        @endforelse
    </tbody>
</table>
