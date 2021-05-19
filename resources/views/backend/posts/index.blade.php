@extends('backend.layout')

@section('page-title','All Posts')
@push('css')
    <style>
        .blog-action a{
            padding:5px
        }
        .blog-action a i{
            padding:5px;
            color:#263238;
        }
        .blog-action a i:hover{
            display: inline-block;
            border-radius: 50%;
            background:#b9bec0;
            color:aliceblue;
            padding: 5px;
        }
        .post-card{
            border:1px solid #9CAEB6;
            border-radius:10px;
        }
        .post-card:hover{
            box-shadow: 5px 10px 18px #888888;
        }
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">All Posts List</h4>

            <div class="row">
                <div class="col-md-12">
                <a href="{{route('post.create')}}"class="btn btn-outline-primary">Create New Post</a>
                <hr>
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <div class="showing-by-status">
                        <a href="{{route('post.index')}}" class="btn btn-primary btn-rounded">All Post <span class='badge badge-warning badge-pill'>{{$allcount}}</span></a>
                    <a href="{{url('published/post')}}" class="btn btn-secondary btn-rounded">Published <span class='badge badge-warning badge-pill'>{{$p_count}}</span></a>
                        <a href="{{url('unpublished/post')}}" class="btn btn-dark btn-rounded">Unpublished <span class='badge badge-warning badge-pill'>{{$up_count}}</span></a>
                    </div><br>
                @foreach ($posts as $posts)
                   <div class="card post-card"style="margin-bottom:5px">
                    <div class="card-body">
                        <div class="row">
                         <div class="col-md-2">
                             <img src="{{asset('storage/posts/'.$posts->image)}}" alt="Post Image"class="img-fluid">
                         </div>
                         <div class="col-md-7">
                         <h5 class="card-title">{{$posts->title}}</h5>  
                             @if ($posts->status==1)
                             <p class="card-text" style="border-radius:10px;display:inline;padding:5px 8px;background:#263238;color:rgb(209, 213, 216)">Published</p>
                             @else
                             <p class="card-text" style="border-radius:10px;display:inline;padding:5px 8px;background:#263238;color:rgb(209, 213, 216)">Unpublished</p>
                             @endif                    
                         <p style="border-radius:10px;display:inline;padding:5px 8px;background:rgb(90, 96, 99);color:rgb(222, 231, 236)">{{$posts->category->name}}</p>
                         <p style="margin-left:5px;margin-top:5px">Date: {{$posts->created_at->format('M d, Y')}}</p>
                         </div>
                         <div class="col-md-3">
                             {{-- action button --}}
                             <div style="float:right;"class="blog-action">
                             <a href="{{route('post.show',$posts->id)}}" title="Show Post"><i class="fa fa-eye" style="font-size:18px"></i></a>
                             <a href="{{route('post.edit',$posts->id)}}" title="Edit Post"><i class="fa fa-pencil" style="font-size:18px"></i></a>
                                <a href="#" title="Delete Post" data-toggle="modal" data-target="#deleteModal{{$posts->id}}"><i class="fa fa-trash" style="font-size:18px"></i></a>
                             </div>
                             {{-- delte modal  --}}
                            <div class="modal fade" id="deleteModal{{$posts->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <h3>You really want to delete this post?</h3>
                                        </div>
                
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button onclick="event.preventDefault();document.getElementById('deletePost{{$posts->id}}').submit();" class="btn btn-danger">Confirm</button>
                                        <form action="{{route('post.destroy',$posts->id)}}"method="post" style="display: none"id="deletePost{{$posts->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        </div>
                                 <!--form end here-->
                                </div>
                                </div>
                            </div>
                             <div>

                             </div>
                         </div>
                     </div>
                    </div>
                </div>
                   @endforeach
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection
