@extends('backend.layout')

@section('page-title','All Reviews')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">All Reviews</h4>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                   <table class="table bordered">
                       <thead class="bg-light">
                           <th>SL</th>
                           <th>Client Name</th>
                           <th>Review</th>
                           <th>Image</th>
                           <th>Action</th>
                       </thead>
                       <tbody class="">
                           @foreach ($review as $item)
                           <tr>
                           <td>{{$loop->index+1}}</td>
                           <td>{{$item->name}}</td>
                           <td>{{$item->review}}</td>
                           <td><img src="{{asset('/storage/image/'.$item->image)}}" alt="Client Image"width='150'></td>
                           
                           <td>
                           <a href="{{url('/delete-review/'.$item->id)}}" class="btn btn-danger">Delete</a>
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
