@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-5">
                @if(file_exists("storage/".$article->pic))
                    <img class="card-img-top" src="/storage/{{$article->pic}}">
                @else
                    <img class="card-img-top" src="{{$article->pic}}">
                @endif
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted text-right">{{$article->created_at->diffForHumans()}}</h6>
                    <h5 class="card-title mb-4 text-center">{{$article->title}}</h5>
                    <p class="card-text mb-4">{!! clean($article->body) !!}</p>
                    <div class="text-center"><a class="card-link" href="{{route('news')}}">Все новости</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
