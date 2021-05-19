@extends('backend.layout')
@section('page-title','Categories')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                {{-- creating category modal --}}
                <!-- Button trigger modal -->
                <button style="font-size:16px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                   Create Category <i class="fa fa-plus-circle" style="font-size: 16px;"></i>
                </button>
                
                <!-- Modals -->
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('category.store')}}"method='post' id='createCategroy'>
                            @csrf
                             <div class="form-group">
                                 <label for="name">Name<span style="color:red">*</span></label>
                                 <input id="name" class="form-control" type="text" name="name">
                             </div>
                             <div class="form-group">
                                <label for="description">Write Description</label>
                                <textarea name="description" class="form-control" id="description" rows="5"></textarea>
                            </div>
                         </form>
                           
                            </div>
    
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button onclick="event.preventDefault();document.getElementById('createCategroy').submit();" class="btn btn-primary">Save</button>
                            </div>
                     <!--form end here-->
                    </div>
                    </div>
                </div>
                <hr>
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif

                    {{-- errro message --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                   @endif
               
                   <table class="table bordered mytable">
                       <thead class="bg-light">
                           <th>#SL</th>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Action</th>
                       </thead>
                       <tbody class="">
                                @foreach ($category as $key=>$category)
                                <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>   
                                <td>
                                <button  type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$category->id}}">
                                    <i class="fa fa-pencil"></i>
                                     </button>
                                     <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$category->id}}">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                </td>
                                </tr>
                                {{-- edit and delete modal --}}
                                <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{route('category.update',$category->id)}}"method='post' id='updateCategroy{{$category->id}}'>
                                            @csrf
                                            @method('PUT')
                                             <div class="form-group">
                                                 <label for="name">Category Name</label>
                                             <input id="name" class="form-control" type="text" name="name"value="{{$category->name}}">
                                             </div>
                                             <div class="form-group">
                                                <label for="description">Write Description</label>
                                             <textarea name="description" class="form-control" id="description" rows="5">{{$category->description}}</textarea>
                                            </div>
                                         </form>
                                           
                                            </div>
                    
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button onclick="event.preventDefault();document.getElementById('updateCategroy{{$category->id}}').submit();" class="btn btn-primary">Save changes</button>
                                            </div>
                                     <!--form end here-->
                                    </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>You really want to delete catagory?</h3>
                                            </div>
                    
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button onclick="event.preventDefault();document.getElementById('deleteCategroy{{$category->id}}').submit();" class="btn btn-danger">Confirm</button>
                                            <form action="{{route('category.destroy',$category->id)}}"method="post" style="display: none"id="deleteCategroy{{$category->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            </div>
                                     <!--form end here-->
                                    </div>
                                    </div>
                                </div>
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

