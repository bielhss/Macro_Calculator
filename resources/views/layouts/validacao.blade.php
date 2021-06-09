@if ($errors->any())
    <div clas="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
            <i class="fa fa-check-circle"></i>
            <span>{{ $error }}</span><br/>
        @endforeach
        <button tyoe="button" class="close" data-dimiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif