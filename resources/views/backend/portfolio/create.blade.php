@extends('backend.layout')

@section('page-title','Add Portfolio')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Add Portfolio Item</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                <a href="{{url('/portfolio-list')}}"class="btn btn-primary">See All Items</a><hr>
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/add-portfolio-post')}}"enctype="multipart/form-data"method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Portfolio Title</label>
                            <input id="title" class="form-control" type="text" name="title"value="{{old('title')}}">
                            <div style="color:red;margin-top:0">
                                @error('title')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="catagory">Portfolio Catagory</label>
                            <input id="catagory" class="form-control" type="text" name="catagory"value="{{old('catagory')}}">
                            <div style="color:red;margin-top:0">
                                @error('catagory')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label><br>
                            <input type="file" name="image" id="image" class="form-control"onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
                            <div style="color: red;margin-top:0">
                              @error('image')
                                {{$message}}
                              @enderror
                            </div>
                          </div>
                          <div class="imagePreview">
                            <img id="previewImage" alt="your image" width="200"/> 
                          </div>
                          <br>
                          <div class="form-group">
                              <input class="btn btn-dark" type="submit" value="Add Portfolio">
                          </div>
                    </form>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection