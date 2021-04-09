@extends('backend.layout')

@section('content')
<div class="col-md-12">
    <div class="card-box">
        <h4 class="header-title">My Account</h4>

        <div class="card">
            <div class="card-body">
                @if (session()->has('msg'))
                    {{session('msg')}}
                @endif
            <form action="{{url('/user-update/'.$data[0]->id)}}" method="post"enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control"value="{{$data[0]->name}}">
                    <div style="color: red;margin-top:0">
                        @error('name')
                          {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$data[0]->email}}">
                    <div style="color: red;margin-top:0">
                        @error('email')
                          {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mt-2">
                    <label for="">Profile Picture</label><br>
                    @if ($data[0]->image)
                    <img src="{{asset('/storage/users/'.$data[0]->image)}}" alt="Profile Picture"width="150">
                    @else
                    <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="Profile Picture">
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">Change Profile Picture</label><br>
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
                  .<div class="form-group">
                    <input type="submit" class="btn btn-dark" value="Update Profile">
                  </div>
            </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection