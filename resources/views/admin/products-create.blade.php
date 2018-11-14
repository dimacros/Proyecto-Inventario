@extends('layouts.dashboard')
@push('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css" />
@endpush
@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-2">
        @component('partials.card-plain')
            <a href="{{ route('productos.index') }}" class="btn btn-primary">
                <i class="nc-icon nc-minimal-left"></i> Regresar
            </a>  
        @endcomponent
        @include('partials.list-errors')
        @include('partials.message')
        <div class="card ">
            <div class="card-header ">
              <h4 class="card-title">Agregar Producto</h4>
            </div>
            <div class="card-body">
                <form id="add_product" method="POST" action="{{ route('productos.store') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>Nombre del Producto</label>
                    <input type="text" name="product_name" class="form-control" placeholder="Ingrese el producto">
                  </div>
                  <div class="form-group">
                    <label>Categoría</label>
                    <select name="category_id" id="category_id" style="display:none;"></select>
                  </div>
                  <div class="form-group">
                    <label>Precio</label>
                    <input type="number" name="product_price" class="form-control">
                  </div>
                </form>
            </div>
            <div class="card-footer ">
              <button type="submit" class="btn btn-info btn-round" form="add_product">Enviar</button>
            </div>
        </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
  <script>
    $.get("{{ route('categorias.index') }}").done(function(categories){
        $('#category_id').selectize({
          valueField: "id",
          labelField: "category_name",
          searchField: "category_name",
          placeholder: "Seleccione o agregue una categoría",
          options: categories,
          render: {
            option_create: function(data, escape) {
              return '<div class="create">Agregar <strong>' + escape(data.input) + '</strong>&hellip;</div>';
            }
          },
          create: function(input, callback) {
            var data = {"_token": "{{ csrf_token() }}", "category_name": input};
            var url = "{{ route('categorias.store') }}";
            $.post(url, data).done(callback);
          }
        });
    });
  </script>
@endpush