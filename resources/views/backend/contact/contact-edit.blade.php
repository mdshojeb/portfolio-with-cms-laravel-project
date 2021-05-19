@extends('backend.layout')

@section('page-title','Edit Contact Section')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Edit Contact Section</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/contact-update/'.$data[0]->id)}}"enctype="multipart/form-data"method="post">
                        @csrf
                       <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span style="color:red">*</span></label>
                                <input id="email" class="form-control" type="text" name="email"value="{{$data[0]->email}}">
                                <div style="color:red;margin-top:0">
                                    @error('email')
                                        {{$message}}  
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input id="facebook" class="form-control" type="text" name="facebook"value="{{$data[0]->facebook}}">
                                <div style="color:red;margin-top:0">
                                    @error('facebook')
                                        {{$message}}  
                                    @enderror
                                </div>
                            </div>
                          
                           </div>
                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <span style="color:red">*</span></label>
                                <input id="phone" class="form-control" type="text" name="phone"value="{{$data[0]->phone}}">
                                <div style="color:red;margin-top:0">
                                    @error('phone')
                                        {{$message}}  
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="twetter">Twetter</label>
                                <input id="twetter" class="form-control" type="text" name="twetter"value="{{$data[0]->twetter}}">
                                <div style="color:red;margin-top:0">
                                    @error('twetter')
                                        {{$message}}  
                                    @enderror
                                </div>
                            </div>
                           </div>
                       </div>
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin">linkedin</label>
                                <input id="linkedin" class="form-control" type="text" name="linkedin"value="{{$data[0]->linkedin}}">
                                <div style="color:red;margin-top:0">
                                    @error('linkedin')
                                        {{$message}}  
                                    @enderror
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pinterest">Pinterest</label>
                                <input id="pinterest" class="form-control" type="text" name="pinterest"value="{{$data[0]->pinterest}}">
                                <div style="color:red;margin-top:0">
                                    @error('pinterest')
                                        {{$message}}  
                                    @enderror
                                </div>
                            </div>
                        </div>
                       </div>
                       <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" class="form-control" type="text" name="address"value="{{$data[0]->address}}">
                        <div style="color:red;margin-top:0">
                            @error('address')
                                {{$message}}  
                            @enderror
                        </div>
                      </div>
                        <div class="form-group">
                            <label for="description">Contact Detail</label>
                        <textarea name="description"  rows="5"class="form-control">{{$data[0]->description}}</textarea>
                            <div style="color:red;margin-top:0">
                                @error('description')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="previewImage">
                            <label for="bg_image">Current Background Image</label><br>
                            <img src="{{asset('/storage/image/'.$data[0]->bg_image)}}" alt="Current Image" width="300">
                        </div>
                        
                        <div class="form-group">
                            <label for="bg_image">Change Background Image</label><br>
                            <input type="file" name="bg_image" id="bg_image" class="form-control"onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
                            <div style="color: red;margin-top:0">
                              @error('bg_image')
                                {{$message}}
                              @enderror
                            </div>
                          </div>
                          <div class="imagePreview">
                            <img id="previewImage" alt="your image" width="300"/> 
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