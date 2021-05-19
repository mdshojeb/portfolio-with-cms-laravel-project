@extends('backend.layout')

@section('page-title','Add Review')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Add Review</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/add-review-post')}}"enctype="multipart/form-data"method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Client Name</label>
                            <input id="name" class="form-control" type="text" name="name"value="{{old('name')}}">
                            <div style="color:red;margin-top:0">
                                @error('name')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review">Review Detail</label>
                            <input id="review" class="form-control" type="text" name="review"value="{{old('review')}}">
                            <div style="color:red;margin-top:0">
                                @error('review')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Client Image</label><br>
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
                              <input class="btn btn-dark" type="submit" value="Save Review">
                          </div>
                    </form>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection