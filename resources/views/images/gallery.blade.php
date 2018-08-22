@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="gallery-row">
                <div class="gallery-column">
                @foreach($images as $image)
                        <img class="gallery-image" src="{{$image->url}}" data-id="{{$image->id}}" alt="{{$image->name}}">
                    @if($loop->iteration % 3 === 0 )
                        </div>
                        <div class="gallery-column">
                    @endif
                @endforeach()
            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="imageModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gallery-modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <img id="gallery-modal-image" src="" alt="">
        </div>
    </div>
</div>
@endsection
