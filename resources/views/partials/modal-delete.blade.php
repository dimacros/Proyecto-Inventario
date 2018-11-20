<div class="modal fade" id="modalDelete-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteTitle-{{$id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDeleteTitle-{{$id}}">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $slot }}
        <form method="POST" id="delete_form-{{$id}}" action="{{ route($routeName, $id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success" form="delete_form-{{$id}}">Sí</button>
      </div>
    </div>
  </div>
</div>  