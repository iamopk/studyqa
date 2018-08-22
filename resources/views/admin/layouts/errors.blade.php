@if(count($errors))
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
        @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
            </div>
        </div>
    </div>
@endif