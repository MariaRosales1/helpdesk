@if(!$errors->isEmpty())
    <div>
        <h2>Se encontraron algunos errores, revisa nuevamente</h2>
    </div>
@endif

<form action="{{route('consultants.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="identification">Identificación</label>
        <input type="text" name="identification">
    </div>
    <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name">
    </div>
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="text" name="email">
    </div>
    <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Guardar asesor</button>
</form>

