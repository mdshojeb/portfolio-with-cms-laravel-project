@extends('backend.layout')

@section('page-title','Edit About Me')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">About Me</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/about-me-post/'.$data[0]->id)}}"enctype="multipart/form-data"method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" name="name"value="{{$data[0]->name}}">
                            <div style="color:red;margin-top:0">
                                @error('name')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <input id="profile" class="form-control" type="text" name="profile"value="{{$data[0]->profile}}">
                            <div style="color:red;margin-top:0">
                                @error('profile')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="text" name="email"value="{{$data[0]->email}}">
                            <div style="color:red;margin-top:0">
                                @error('email')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" class="form-control" type="text" name="phone"value="{{$data[0]->phone}}">
                            <div style="color:red;margin-top:0">
                                @error('phone')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about_detail">About Detail</label>
                        <textarea name="about_detail" id="editor" cols="30" rows="10"class="form-control">{{$data[0]->about_detail}}</textarea>
                            <div style="color:red;margin-top:0">
                                @error('about_detail')
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