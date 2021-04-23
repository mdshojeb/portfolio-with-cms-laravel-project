@extends('backend.layout')

@section('page-title','Add Services')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Add Services</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                <a href="{{url('/service-list')}}"class="btn btn-primary">See All Services</a><hr>
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/add-service-post')}}"enctype="multipart/form-data"method="post">
                        @csrf
                        <div class="form-group">
                            <label for="service_title">Service Title</label>
                            <input id="service_title" class="form-control" type="text" name="service_title"value="{{old('service_title')}}">
                            <div style="color:red;margin-top:0">
                                @error('service_title')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail">Service Detail</label>
                            <input id="detail" class="form-control" type="text" name="detail"value="{{old('detail')}}">
                            <div style="color:red;margin-top:0">
                                @error('detail')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icon">Service Icon (Put Font-Awesome Icon Class v-4)</label>
                            <input id="text" class="form-control" type="text" name="icon" placeholder="Example : fa fa-facebook"value="{{old('icon')}}">
                            <div style="color:red;margin-top:0">
                                @error('icon')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                       
                          <div class="form-group">
                              <input class="btn btn-dark" type="submit" value="Add Service">
                          </div>
                    </form>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection