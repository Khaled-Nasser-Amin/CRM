@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    </div>
@endif
