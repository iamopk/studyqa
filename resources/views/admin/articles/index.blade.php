@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Pic Url</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <th scope="row">{{$article->id}}</th>
                        <td>{{$article->title}}</td>
                        @if(file_exists("storage/".$article->pic))
                            <td><img width="100" src="/storage/{{$article->pic}}" /></td>
                        @else
                            <td><img width="100" src="{{$article->pic}}" /></td>
                        @endif
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('admin.news.edit', ['id' => $article->id])}}">Edit</a>
                            <a class="btn btn-outline-danger btn-sm delete-article" href="{{route('admin.news.destroy', ['id' => $article->id])}}">Delete</a>
                        </td>
                    </tr>
                @endforeach()
                </tbody>
            </table>

            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection
