@extends('backend.layout')

@section('page-title','Counter Section')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Counter Section</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/counter-post/'.$data[0]->id)}}"method="post"enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="work_complete">Works Completed</label>
                            <input id="work_complete" class="form-control" type="number" name="work_complete"value="{{$data[0]->workes_completed}}">
                            <div style="color:red;margin-top:0">
                                @error('work_complete')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="year_of_experience">YEARS OF EXPERIENCE</label>
                            <input id="year_of_experience" class="form-control" type="number" name="year_of_experience"value="{{$data[0]->years_of_experience}}">
                            <div style="color:red;margin-top:0">
                                @error('year_of_experience')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_clients">TOTAL CLIENTS</label>
                            <input id="total_clients" class="form-control" type="number" name="total_clients"value="{{$data[0]->total_clients}}">
                            <div style="color:red;margin-top:0">
                                @error('total_clients')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="awered_won">AWARD WON</label>
                            <input id="awered_won" class="form-control" type="number" name="awered_won"value="{{$data[0]->awered_won}}">
                            <div style="color:red;margin-top:0">
                                @error('awered_won')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="previewImage">
                            <label for="userImage">Banner Image</label><br>
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