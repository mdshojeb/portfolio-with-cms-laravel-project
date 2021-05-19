@extends('backend.layout')

@section('page-title','Review Section')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Change Background</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/review-bg-update/'.$image[0]->id)}}"enctype="multipart/form-data"method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Current Image</label><br>
                        <img src="{{asset('/storage/image/'.$image[0]->image)}}" alt="background image"class='img-fluid'width="300"><br>
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