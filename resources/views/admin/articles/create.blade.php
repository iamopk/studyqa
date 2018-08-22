@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="post" action="{{route('admin.news.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titleFormControl">Заголовок</label>
                    <input value="{{old('title')}}" type="text" name="title" class="form-control" id="titleFormControl" placeholder="Заголовок">
                </div>
                <div class="form-group">
                    <label for="picFormControl">Картинка</label>
                    <input value="{{old('file')}}" type="file" name="file" class="form-control-file" id="picFormControl" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="bodyFormControl">Текст</label>
                    <textarea class="form-control" name="body" id="bodyFormControl" rows="3">{{old('body')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Создать</button>
            </form>
        </div>
    </div>
</div>
@endsection
