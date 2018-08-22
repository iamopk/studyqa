@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="post" action="{{route('admin.page.update', ['id' => $page->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titleFormControl">Заголовок</label>
                    <input value="{{$page->title}}" required type="text" name="title" class="form-control" id="titleFormControl" placeholder="Заголовок">
                </div>
                <div class="form-group">
                    <label for="bodyFormControl">Текст</label>
                    <textarea class="form-control summernote" required name="text" id="bodyFormControl" data-image-url="{{ route('admin.ajax.upload.image') }}" rows="3">{{$page->text}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Обновить</button>
            </form>
        </div>
    </div>
</div>
@endsection
