@extends('backend.layout')

@section('page-title','Portfolio List')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">All Portfolio Items</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                <a href="{{url('/add-portfolio')}}"class="btn btn-warning">Add Portfolio Item</a>
                <hr>
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                   <table class="table bordered">
                       <thead class="bg-light">
                           <th>SL</th>
                           <th>Title</th>
                           <th>Catagory</th>
                           <th>Image</th>
                           <th>Action</th>
                       </thead>
                       <tbody class="">
                           @foreach ($portfolio as $item)
                           <tr>
                           <td>{{$loop->index+1}}</td>
                           <td>{{$item->title}}</td>
                           <td>{{$item->catagory}}</td>
                           <td><img src="{{asset('/storage/image/portfolio/'.$item->image)}}" alt="Portfolio Image"width='150'></td>
                           
                           <td>
                           <a href="{{url('/delete-portfolio/'.$item->id)}}" class="btn btn-danger">Delete</a>
                           </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection
