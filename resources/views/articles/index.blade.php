@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($articles as $article)
                <div class="card mb-5">
                    @if(file_exists("storage/".$article->pic))
                        <img class="card-img-top" src="/storage/{{$article->pic}}">
                    @else
                        <img class="card-img-top" src="{{$article->pic}}">
                    @endif
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">{{$article->created_at->diffForHumans()}}</h6>
                        <a href="{{route('news.show', ['article'=>$article])}}">
                            <h5 class="card-title">{{$article->title}}</h5>
                        </a>
                        <p class="card-text">{{ substr($article->body, 0, 50) }}...</p>
                    </div>
                </div>
            @endforeach()

            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection
