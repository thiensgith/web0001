@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center h5">Profile</div>

                <div class="card-body row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-4 p-5 text-center">
                    <img class="img-fluid rounded-circle zoom" data-toggle="modal" data-target="#avatarModal" src="@if(Auth::user()->avatar) {{asset('assets/user_avatar/'.Auth::user()->avatar)}} @else {{asset('assets/images/default/user.png')}} @endif" alt="">
                    <small>Change Avatar</small> 
                    <form method="POST" action="{{ route('user_avt') }}" enctype="multipart/form-data">
                          <!-- Modal -->
                          <div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" >Change Avatar</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                            @csrf
                                            <div class="custom-file">
                                                <input type="file" name="avatar" class="custom-file-input  @error('avatar') is-invalid @enderror" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror    
                                            </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-outline-dark">Save changes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-8 p-5">
                        <h4 class="mb-3">Personal Information</h5>
                        <dl class="row">
                            <dt class="col-sm-3">{{ __('user.fname')}}</dt>
                            <dd class="col-sm-9">{{ Auth::user()->fname }}</dd>
                            
                            <dt class="col-sm-3">{{ __('user.lname')}}</dt>
                            <dd class="col-sm-9">{{ Auth::user()->lname }}</dd>
                            
                            <dt class="col-sm-3">{{ __('user.gender')}}</dt>
                            <dd class="col-sm-9">{{ Auth::user()->gender }}</dd>

                            <dt class="col-sm-3">{{ __('Email')}}</dt>
                            <dd class="col-sm-9">{{ Auth::user()->email }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
