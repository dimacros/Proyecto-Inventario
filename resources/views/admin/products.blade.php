@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-body">
          <a href="{{ route('productos.create') }}" class="btn btn-success">Nuevo Producto</a>
        </div>
      </div>
      @include('partials.list-errors')
      @include('partials.message')
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Lista de Productos</h4> 
          <hr>
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
                    <td>{{ $product->name }} </td>
                    <td>{{ $product->category->name }}</td>
                    <td class="text-center">{{ $product->price }}</td>
                    <td class="text-right">
                      <button class="btn border btn-info btn-link btn-icon">
                        <i class="fa fa-eye"></i>
                      </button>
                      <button class="btn border btn-warning btn-link btn-icon"
                      data-toggle="modal" data-target="#modalEdit-{{$product->id}}">
                        <i class="fa fa-edit"></i>
                      </button>
                    <button class="btn border btn-danger btn-link btn-icon" 
                    data-toggle="modal" data-target="#modalDelete-{{$product->id}}">
                        <i class="fa fa-times"></i>
                      </button>
                    </td>
                  </tr>  
                  <!-- Modal Edit -->        
                  @component('partials.modal-edit', [
                    'id' => $product->id, 
                    'title' => 'Editar Producto'
                  ])
                    <form method="POST" id="edit_form-{{$product->id}}" action="{{ route('productos.update', $product->id) }}">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      <div class="form-group">
                        <label>Nombre del Producto</label>
                        <input type="text" name="product_name" class="form-control" value="{{$product->name}}">
                      </div>
                      <div class="form-group">
                        <label>Categoría</label>
                        <input type="text" class="form-control" value="{{$product->category->name}}" readonly>
                      </div>
                      <div class="form-group">
                        <label>Precio</label>
                        <input type="number" name="product_price" class="form-control" step="0.01" value="{{$product->price}}">
                      </div>                        
                    </form>
                  @endcomponent   
                  <!-- Modal Delete -->
                  @component('partials.modal-delete', [
                    'id' => $product->id, 
                    'routeName' => 'productos.destroy',
                    'title' => 'Eliminar Producto'
                  ])
                    ¿Seguro que quiere eliminar el producto <strong>"{{ $product->name }}"</strong>?
                  @endcomponent           
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!--/.col-md-12-->
  </div>
@endsection