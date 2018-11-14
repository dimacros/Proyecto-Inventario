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
        <div class="card ">
            <div class="card-header ">
              <h4 class="card-title">Agregar Producto</h4>
            </div>
            <div class="card-body ">
                <form method="#" action="#">
                  <label>Nombre del Producto</label>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Ingrese el producto">
                  </div>
                  <label>Categoría</label>
                  <div class="form-group">
                      <select name="" id="lol"></select>
                  </div>
                  <div class="form-group">
                    <label>Precio</label>
                    <input type="number" class="form-control">
                  </div>
                </form>
            </div>
            <div class="card-footer ">
              <button type="submit" class="btn btn-info btn-round">Enviar</button>
            </div>
        </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
  <script>
    $('#lol').selectize({
      create: function(input, callback) {
        $.post("{{ route('categorias.store') }}", {"category_name": input}).donde(callback(response));
      }, 
      placeholder: "Seleccione o agregue un nuevo producto",
      render: {
        option_create: function(data, escape) {
          return '<div class="create">Agregar <strong>' + escape(data.input) + '</strong>&hellip;</div>';
        }
      }
    });
  </script>
@endpush