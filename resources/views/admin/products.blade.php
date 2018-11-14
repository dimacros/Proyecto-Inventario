@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-md-12">
      @component('partials.card-plain')
        <a href="{{ route('productos.create') }}" class="btn btn-success">Nuevo Producto</a>
      @endcomponent
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Lista de Productos</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="text-primary">
                <tr>
                  <th>Nombre</th>
                  <th>Categoría</th>
                  <th class="text-center">Precio</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td class="text-center">{{ $product->price }}</td>
                    <td class="text-right">
                      <button class="btn btn-primary">Editar</button>
                      <button class="btn btn-danger">Eliminar</button>
                    </td>
                  </tr>                    
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!--/.col-md-12-->
  </div>
@endsection