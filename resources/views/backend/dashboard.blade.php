@extends('backend.layout')

@section('page-title','Dashboard')
    

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">Account Overview</h4>

                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-3">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#0acf97" value="37" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Daily Sales</p>
                                    <h3 class="">$35,715</h3>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xl-3">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#f9bc0b" value="92" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Sales Analytics</p>
                                    <h3 class="">$97,511</h3>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xl-3">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#f1556c" value="14" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Statistics</p>
                                    <h3 class="">$954</h3>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xl-3">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#2d7bf4" value="60" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Total Revenue</p>
                                    <h3 class="">$32,540</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end row -->


        {{-- message showing --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title mb-3">Recent Message <i class="fa fa-comment"></i></h4>
                    <div class="table-responsive">
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
        <!-- end row -->
    </div> <!-- container -->

</div>
@endsection