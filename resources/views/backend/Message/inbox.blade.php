@extends('backend.layout')

@section('page-title','Inbox')
    
@section('content')
<div class="card-box">
    <!-- Left sidebar -->
    <div style="display:inline-block">

        <a href="email-compose.html" class="btn btn-danger btn-block waves-effect waves-light">Compose</a>  
    </div><br>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title mb-3"> Message <i class="fa fa-comment"></i></h4>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session('success')}}
                  </div>
                @endif
                <a href="{{url('/message/all-message')}}" class="btn btn-info btn-rounded">All Message <span class='badge badge-dark badge-pill'>{{$all_msg}}</span></a>
                <a href="{{url('/message/unseen-message')}}" class="btn btn-dark btn-rounded">Unseen <span class='badge badge-danger badge-pill'>{{$unseen_msg}}</span></a>    
                <div class="table-responsive mt-2">
                    <table class="table table-hover table-centered m-0 mytable">
                        <thead class="bg-dark text-light">
                            <th>Author</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach ($message as $item)
                        <tr style="background:{{$item->status==0?'#F3F6F8':''}}">                    
                                <td style="width:35%">
                                    <h5 class="m-0 font-weight-normal">{{$item->name}} ({{$item->email}})</h5>
                                <p class="mb-0 text-muted"><small>{{$item->created_at->format('g:i A')}}, {{$item->created_at->format('M d Y')}}</small></p>
                                </td>
                                <td style="width:50%">
                                    {{$item->subject}}
                                </td>
    
                                <td style="width:15%">
                                <a href="{{url('/message/show/'.$item->id)}}" class="btn btn-sm btn-custom"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"data-toggle="modal" data-target="#deleteModal{{$item->id}}"><i class="fa fa-trash"></i></a>
                                    <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteMessageLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <h3>You really want to delete this Message?</h3>
                                                </div>
                        
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button onclick="event.preventDefault();document.getElementById('deleteMessage{{$item->id}}').submit();" class="btn btn-danger">Confirm</button>
                                                <form action="{{url('/message/delete/'.$item->id)}}"method="post" style="display: none" id="deleteMessage{{$item->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                </div>
                                         <!--form end here-->
                                        </div>
                                        </div>
                                    </div>
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