<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<div class="limiter">
	<div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
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
