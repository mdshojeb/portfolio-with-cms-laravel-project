@extends('backend.layout')

@section('page-title','Edit Section Details')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Service Section Details</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/section-detail-post/'.$data[0]->id)}}"method="post">
                        @csrf
                        <div class="form-group">
                            <label for="section_detail">Section Details</label>
                            <input id="section_detail" class="form-control" type="text" name="section_detail"value="{{$data[0]->detail}}">
                            <div style="color:red;margin-top:0">
                                @error('section_detail')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                          <div class="form-group">
                              <input class="btn btn-dark" type="submit" name=""value="Save">
                          </div>
                        
                    </form>
                    <hr>
                    <a href="{{'/add-service'}}" class="btn btn-warning">Add Service</a>
                    <a href="{{'/service-list'}}" class="btn btn-primary">See All Service</a>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection