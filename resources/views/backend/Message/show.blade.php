@extends('backend.layout')

@section('page-title','Show Message')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
    
    </style>
@endpush
    
@section('content')
<div class="card-box">
    <h4 class="card-title">Show Single Message</h4>
    <!-- Left sidebar -->
        <a href="{{url('/message/inbox')}}"class="btn btn-warning  waves-effect waves-light">Inbox</a>
        <a href="email-compose.html" class="btn btn-primary  waves-effect waves-light">Compose</a>  
<br>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="mt-4">
                    <div class="media mb-4 mt-1">
                    <img class="d-flex mr-3 rounded-circle thumb-md" src="{{asset('/storage/image/avatar.png')}}" alt="Generic placeholder image">
                        <div class="media-body">
                        <span class="pull-right">{{$message[0]->created_at->format('g:i A')}}<br>Date: {{$message[0]->created_at->format('M d, Y')}}</span>
                        <h5 class="m-0">{{$message[0]->name}}</h5>
                        <p class="text-muted">From: {{$message[0]->email}}</p>
                        
                        </div>
                    </div>
                    <div class="message"style="font-size:15px">
                    <p>{{$message[0]->message}}</p>
                    </div>

                    <hr> 
            {{-- reply button --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <span class="btn btn-pink" id="reply">Reply</span>
                <br>
               
                <div class="row" id="reply-form"style="display:none">
                    <div class="col-md-8 offset-md-2">
                       
                        <form action="{{url('/message/reply/'.$message[0]->id)}}"method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="email">To</label>
                                <input id="email" type="text" class="form-control" name="mail_address" value="{{$message[0]->email}}">
                            </div>
                            <div class="form-group">
                                <label for="my-textarea">Your Message</label>
                                <textarea id="summernote" class="form-control" name="msg_body" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                               <input type="submit" value="Send Reply"class="btn btn-primary btn-rounded">
                            </div>
                        </form>
                    </div>
                </div>
                </div>  
            </div>
        </div>            
    </div>
   
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Write your post',
            tabsize: 2,
            height: 200
    });
    });
    </script>

    {{-- reply button for mail --}}
    <script>
        $(document).ready(function(){
            $('#reply').click(function(){
                $('#reply-form').slideToggle();
            });
        });
    </script>
@endpush