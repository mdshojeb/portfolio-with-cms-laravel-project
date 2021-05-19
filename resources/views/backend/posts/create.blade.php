@extends('backend.layout')

@section('page-title','Create New Post')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
    
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    {{-- error msg showing --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="font-size:16px;list-style:none">
                            @foreach ($errors->all() as $error)
                                <li><i class="fa fa-warning"></i>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                   @endif
                    <div class="card"style="">
                        <h3 class="mb-4 text-center">Create New Post</h3>
                        <div class="card-body">
                            <form action="{{route('post.store')}}"enctype="multipart/form-data"method="post">
                               @csrf
                               <div class="form-group">
                                   <label for="title">Title</label>
                               <input id="title" class="form-control" type="text" name="title"placeholder="Your post title..."value="{{old('title')}}">
                               </div> 
                               <div class="row">
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category_id">Post Category</label>
                                        <select name="category_id" id="category"class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach ($category as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                   </div>
                                   </div>
                                   <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="image">Feature Image</label><br>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                               </div>
                               <div class="form-group">
                                <label>Post Status</label><br>
                                <input type="checkbox" name="status" id="status"> <label for="status">Published</label>
                            </div>
                               <div class="form-group">
                                <label for="body">Post Body</label>
                                <textarea name="body" id="summernote" class="form-control"></textarea>  
                            </div>
                            {{-- submit form --}}
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save Post">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Write your post',
            tabsize: 2,
            height: 200
      });
      });
    </script>
@endpush