@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="post" action="{{route('admin.images.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titleFormControl">Имя</label>
                    <input value="{{old('name')}}" required type="text" name="name" class="form-control" id="titleFormControl" placeholder="Имя">
                </div>
                <div class="form-group">
                    <label for="picFormControl">Картинка</label>
                    <input value="{{old('file')}}" required type="file" name="file" class="form-control-file" id="picFormControl" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Загрузить</button>
            </form>
        </div>
    </div>
</div>
@endsection
