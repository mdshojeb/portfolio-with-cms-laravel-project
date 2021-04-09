@extends('backend.layout')

@section('page-title','Edit Main Intro')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Main Intro</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/main-intro-post/'.$data[0]->id)}}"enctype="multipart/form-data"method="post">
                        @csrf
                        <div class="form-group">
                            <label for="intro_title">Intro Title</label>
                            <input id="intro_title" class="form-control" type="text" name="intro_title"value="{{$data[0]->intro_title}}">
                            <div style="color:red;margin-top:0">
                                @error('intro_title')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="intro_subtitle">Intro Subtitle (Use comma after each skill)</label>
                            <input id="intro_subtitle" class="form-control" type="text" name="intro_subtitle"value="{{$data[0]->intro_subtitle}}">
                            <div style="color:red;margin-top:0">
                                @error('intro_subtitle')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="previewImage">
                            <label for="intro_subtitle">Current Banner Image</label><br>
                            <img src="{{asset('/storage/image/'.$data[0]->image)}}" alt="Current Image" width="200">
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Change Banner Image</label><br>
                            <input type="file" name="image" id="image" class="form-control"onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
                            <div style="color: red;margin-top:0">
                              @error('image')
                                {{$message}}
                              @enderror
                            </div>
                          </div>
                          <div class="imagePreview">
                            <img id="previewImage" alt="your image" width="200"/> 
                          </div><br>
                          <div class="form-group">
                              <input class="btn btn-dark" type="submit" name=""value="Save">
                          <a href="{{url('dashboard')}}" class="btn btn-secondary">Cancel</a>
                          </div>
                        
                    </form>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection