@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <h5 class="alert-heading">¡Tiene error(es) en su formulario!</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif