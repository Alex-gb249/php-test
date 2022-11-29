@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('personas') }}" method="post">
        @csrf

        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" class="form-control" name="cedula" id="cedula">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
            <label for="sexo" class="form-label">Sexo</label>
            <input type="text" class="form-control" name="sexo" id="sexo">
        </div>
        <button type="submit" class="btn btn-primary">Crear persona</button>
    </form>
</div>

<div class="container w-50 border p-4 mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cédula</th>
                <th scope="col">Nacimiento</th>
                <th scope="col">Sexo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                <tr>
                    <th scope="row">{{$persona->id}}</th>
                    <td>{{$persona->nombre}}</td>
                    <td>{{$persona->cedula}}</td>
                    <td>{{$persona->fecha_nacimiento}}</td>
                    <td>{{$persona->sexo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection