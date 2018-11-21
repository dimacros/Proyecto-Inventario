@extends('layouts.dashboard')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-body">
          <a href="{{ route('clientes.create') }}" class="btn btn-success">Nuevo Cliente</a>
        </div>
      </div>
      @include('partials.list-errors')
      @include('partials.message')
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Lista de Clientes</h4> 
          <hr>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="text-primary">
                <tr>
                  <th>Documento</th>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customers as $customer)
                  <tr>
                    <td>
                      <strong>{{ $customer->document }}:</strong>  {{ $customer->document_number }} 
                    </td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td class="text-right">
                      <button class="btn border btn-info btn-link btn-icon">
                        <i class="fa fa-eye"></i>
                      </button>
                      <button class="btn border btn-warning btn-link btn-icon"
                      data-toggle="modal" data-target="#modalEdit-{{$customer->id}}">
                        <i class="fa fa-edit"></i>
                      </button>
                    <button class="btn border btn-danger btn-link btn-icon" 
                    data-toggle="modal" data-target="#modalDelete-{{$customer->id}}">
                        <i class="fa fa-times"></i>
                      </button>
                    </td>
                  </tr>  
                  <!-- Modal Edit -->        
                  @component('partials.modal-edit', [
                    'id' => $customer->id, 
                    'title' => 'Editar Cliente'
                  ])
                    <form method="POST" id="edit_form-{{$customer->id}}" action="{{ route('clientes.update', $customer->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group edit_document">
                            <label>Tipo de documento</label>
                            <div class="input-group">
                                <input type="text" name="document" class="form-control" value="{{ $customer->document }}" readonly>
                                <div class="input-group-append">
                                  <button class="btn btn-outline-dark my-0" type="button">
                                      <i class="fa fa-pencil"></i>
                                  </button>
                                </div>
                            </div>
                            <select class="custom-select document_type">
                                <option value="DNI">DNI</option>
                                <option value="RUC">RUC</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Número del Documento</label>
                            <input type="text" name="document_number" class="form-control" 
                            value="{{ $customer->document_number }}">
                        </div>
                        <div class="form-group">
                            <label>Nombre del Cliente</label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                        </div>
                        <div class="form-group">
                          <label>Número del Cliente</label>
                          <input type="tel" name="phone" class="form-control" value="{{ $customer->phone }}">
                        </div>                   
                    </form>
                  @endcomponent   
                  <!-- Modal Delete -->
                  @component('partials.modal-delete', [
                    'id' => $customer->id, 
                    'routeName' => 'clientes.destroy',
                    'title' => 'Eliminar Cliente'
                  ])
                    ¿Seguro que quiere eliminar al cliente <strong>"{{ $customer->name }}"</strong>?
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
@push('scripts')
<script>

</script>
@endpush