@extends('backend.layout')

@section('page-title','Website Setting')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h3 class="header-title mb-4 ">WEBSITE SETTING</h3>
            <hr>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if (session()->has('msg'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>✔ Good Job!</strong> {{session('msg')}}
                      </div>
                    @endif
                    <form action="{{url('/website-settings/'.$properties[0]->id)}}"enctype="multipart/form-data"method="post">
                        @csrf
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="web_title">Website Title</label>
                              <input id="web_title" class="form-control" type="text" name="web_title"value="{{$properties[0]->web_title}}">
                              <div style="color:red;margin-top:0">
                                  @error('web_title')
                                      {{$message}}  
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="footer_credit">Footer Credit</label>
                              <input id="footer_credit" class="form-control" type="text" name="footer_credit"value="{{$properties[0]->footer_credit}}">
                              <div style="color:red;margin-top:0">
                                  @error('footer_credit')
                                      {{$message}}  
                                  @enderror
                              </div>
                          </div>
                          </div>
                          <div class="col-md-6">                
                            <div class="form-group">
                                <label for="logo">Change Website Logo</label><br>
                                <input type="file" name="logo" id="logo" class="form-control"onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
                                <div style="color: red;margin-top:0">
                                  @error('logo')
                                    {{$message}}
                                  @enderror
                                </div>
                              </div>  
                              <div class="form-group">
                                <label for="icon">Website Favicon (40px x 40px)</label><br>
                                <input type="file" name="icon" id="icon" class="form-control"onchange="document.getElementById('previewIcon').src = window.URL.createObjectURL(this.files[0])">
                                <div style="color: red;margin-top:0">
                                  @error('icon')
                                    {{$message}}
                                  @enderror
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="show_logo" id="show_logo"{{$properties[0]->show_logo==1?"checked":""}}> <label for="show_logo">Show Logo</label>
                        </div>
                        
                          <div class="form-group">
                              <input class="btn btn-dark" type="submit" name=""value="Save">
                          <a href="{{url('dashboard')}}" class="btn btn-secondary">Cancel</a>
                          </div>
                        
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-10 offset-md-1">
                <button style="font-size:16px;margin-bottom:5px" type="button" class="btn btn-info" data-toggle="modal" data-target="#changePassword">
                  Change Password
               </button>
               {{-- showing errors change password --}}
                <div class="errors">
                  @if ($errors->any())
                  <div class="alert alert-danger" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach ($errors->all() as $error)
                        <ul>
                          <li>{{$error}}</li>
                        </ul>
                    @endforeach
                  </div>
                 @endif
                 @if (session('success'))
                  <div class="alert alert-success" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session('success')}}
                    </div>
                 @endif
                 @if (session('error'))
                 <div class="alert alert-danger" role="alert">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       {{session('error')}}
                   </div>
                @endif
                </div>
              {{-- changing password --}}
                 <!-- Modals -->
                 <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                          </div>
                          <div class="modal-body">
                          <form action="{{url('/user/change-password/'.session('id'))}}"method='post' id='change_password'>
                              @csrf
                              <div class="form-group">
                                  <label for="old_password">Enter Old Password<span style="color:red">*</span></label>
                                  <input id="old_password" class="form-control" type="password" name="old_password">
                              </div>
                              <div class="form-group">
                                <label for="password">Enter New Password<span style="color:red">*</span></label>
                                <input id="password" class="form-control" type="password" name="password">
                              </div>
                              <div class="form-group">
                                <label for="confirm_password">Confirm New Password<span style="color:red">*</span></label>
                                <input id="confirm_password" class="form-control" type="password" name="password_confirmation">
                              </div> 
                         </form>
                         
                          </div>
  
                          <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button onclick="event.preventDefault();document.getElementById('change_password').submit();" class="btn btn-primary">Save</button>
                          </div>
                   <!--form end here-->
                  </div>
                  </div>
              </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection