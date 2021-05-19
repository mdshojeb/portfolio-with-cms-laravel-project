@extends('backend.layout')

@section('page-title',$post[0]->title)
@push('css')
    
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Single Post Show</h4>
            <div class="row">
                <div class="col-md-12">
                <a href="{{route('post.edit',$post[0]->id)}}"class="btn btn-outline-primary">Edit Post</a>
                    <hr>
                    <h4 style="margin-bottom:0">{{$post[0]->title}}</h4>
                    <p style="margin-top:0">{{$post[0]->created_at->format('M d, Y')}}</p>
                    <img src="{{asset('/storage/posts/'.$post[0]->image)}}" alt="post image"class="img-fluid">
                        <div class="card-body">
                            {!! $post[0]->body!!}
                        </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection
