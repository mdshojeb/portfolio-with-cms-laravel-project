@extends('backend.layout')

@section('page-title','Add Skill')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Add Skill</h4>
            @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                 @endif
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <form action="{{url('/add-skill-post/')}}"method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Skill Title</label>
                            <input id="title" class="form-control" type="text" name="title">
                            <div style="color:red;margin-top:0">
                                @error('title')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="progress">Progress (Max value 100)</label>
                            <input id="progress" class="form-control" type="number" name="progress">
                            <div style="color:red;margin-top:0">
                                @error('progress')
                                    {{$message}}  
                                @enderror
                            </div>
                        </div>
                        <br>
                          <div class="form-group">
                              <input class="btn btn-dark" type="submit" name=""value="Add">
                          </div>
                    </form>
                </div>
            </div>
            <hr>
            <!-- end row -->
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h3>All Skills</h3>
                    <table class="table">
                        <thead class="bg-info text-light">
                            <th>#SL</th>
                            <th>Skill Name</th>
                            <th>Progress</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($skill as $item)
                            <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->progress}}</td>
                                <td>
                                <a href="{{url('/skill-delete/'.$item->id)}}"class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection