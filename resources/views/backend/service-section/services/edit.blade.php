@extends('backend.layout')

@section('page-title','Edit Services')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Edit Services</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <form action="{{url('/service-update/'.$data[0]->id)}}"method="post">
                        @csrf
                        <div class="form-group">
                            <label for="service_title">Service Title</label>
                        <input id="service_title" class="form-control" type="text" name="service_title"value="{{$data[0]->services_title}}">
                            <div style="color:red;margin-top:0">
                                @error('service_title')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail">Service Detail</label>
                            <input id="detail" class="form-control" type="text" name="detail"value="{{$data[0]->detail}}">
                            <div style="color:red;margin-top:0">
                                @error('detail')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icon">Service Icon (Put Font-Awesome Icon Class v-4)</label>
                            <input id="text" class="form-control" type="text" name="icon"value="{{$data[0]->icon}}">
                            <div style="color:red;margin-top:0">
                                @error('icon')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                       
                          <div class="form-group">
                              <input class="btn btn-dark" type="submit"value="Save">
                          <a href="{{url('/service-section')}}" class="btn btn-secondary">Cancel</a>
                          </div>
                    </form>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection