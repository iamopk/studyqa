@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="post" action="{{route('admin.news.update', ['id' => $article->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titleFormControl">Заголовок</label>
                    <input value="{{$article->title}}" required type="text" name="title" class="form-control" id="titleFormControl" placeholder="Заголовок">
                </div>
                <div class="form-group">
                    <label for="picFormControl">Картинка</label>
                    @if(file_exists("storage/".$article->pic))
                        <div id="imgPicture" class="mt-1"><img width="200" src="/storage/{{$article->pic}}" /></div>
                    @else
                        <div id="imgPicture" class="mt-1"><img width="200" src="{{$article->pic}}" /></div>
                    @endif
                    <button id="btnPictureChange" class="btn btn-warning btn-sm mt-2">Сменить картинку</button>
                    <input type="file" name="file" class="form-control-file mt-2" id="picFormControl" accept="image/*" style="display: none;">
                </div>
                <div class="form-group">
                    <label for="bodyFormControl">Текст</label>
                    <textarea class="form-control summernote" required name="body" id="bodyFormControl" data-image-url="{{ route('admin.ajax.upload.image') }}" rows="3">{{$article->body}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Обновить</button>
            </form>
        </div>
    </div>
</div>
@endsection
