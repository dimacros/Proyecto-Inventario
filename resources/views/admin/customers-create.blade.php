@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-plain">
          <div class="card-body">
            <a href="{{ route('clientes.index') }}" class="btn btn-primary">
                <i class="nc-icon nc-minimal-left"></i> Regresar
            </a>  
          </div>
        </div>
        @include('partials.list-errors')
        @include('partials.message')
        <div class="card ">
            <div class="card-header ">
              <h4 class="card-title">Agregar Cliente</h4>
            </div>
            <div class="card-body">
                <form id="add_customer" method="POST" action="{{ route('clientes.store') }}">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Tipo de documento</label>
                        <select name="document" class="custom-select">
                            <option value="DNI">DNI</option>
                            <option value="RUC">RUC</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label>Número del Documento</label>
                        <input type="text" name="document_number" class="form-control" 
                        placeholder="Ingrese el DNI O RUC del cliente">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nombre del Cliente</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre del cliente">
                  </div>
                  <div class="form-group">
                    <label>Número del Cliente</label>
                    <input type="tel" name="phone" class="form-control" placeholder="Ingrese el télefono o celular">
                  </div>
                </form>
            </div>
            <div class="card-footer ">
              <button type="submit" class="btn btn-info btn-round" form="add_customer">Enviar</button>
            </div>
        </div>
    </div>
  </div>
@endsection