@extends('app')

@section('content')
<div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
        <form action="{{ route('categorias.store') }}" method="post">
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" name="color" id="color">
            </div>
            <button type="submit" class="btn btn-primary">Crear categoría</button>
        </form>
    </div>
</div>
@foreach ($categorias as $idc => $categoria)
    @if (sizeof($categorias[$idc][1])>0) 
        <div class="container w-50 border p-4 mt-4">
            <h3>{{$categoria[0]}}</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tienda</th>
                        <th scope="col">Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias[$idc][1] as $idt => $tienda)
                    <tr>
                        <th scope="row">{{$idt}}</th>
                        <td>{{$tienda}}</td>
                        <td>{{$categoria[0]}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endforeach
@endsection