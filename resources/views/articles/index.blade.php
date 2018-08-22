@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($articles as $article)
                <div class="card mb-5">
                    <img class="card-img-top" src="{{$article->pic}}" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">{{$article->created_at->diffForHumans()}}</h6>
                        <a href="{{route('news.show', ['article'=>$article])}}">
                            <h5 class="card-title">{{$article->title}}</h5>
                        </a>
                        <p class="card-text">{{$article->body}}</p>
                    </div>
                </div>
            @endforeach()

            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection