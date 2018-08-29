@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Url</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($images as $image)
                    <tr>
                        <th scope="row">{{$image->id}}</th>
                        <td>{{$image->name}}</td>
                        @if(file_exists("storage/".$image->url))
                            <td><img width="100" src="/storage/{{$image->url}}" /></td>
                        @else
                            <td><img width="100" src="{{$image->url}}" /></td>
                        @endif
                        <td>
                            @can('destroy', \App\Image::class)
                                <a class="btn btn-outline-danger btn-sm delete-article" href="{{route('admin.images.destroy', ['id' => $image->id])}}">Delete</a>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <h1>Нет картинок</h1>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection
