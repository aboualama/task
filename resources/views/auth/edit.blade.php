@extends('layouts.app')

@section('title')
 {{ $user->first_name  }}
@endsection

@section('content')

 
 
<!-- banner -->
    <div class="banner10" id="home1">
        <div class="container">
            <h2>Edit:- {{$user->first_name}}</h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Edit</li>
            </ul>
        </div>
    </div>
<!-- //breadcrumbs -->







<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <hr>
                <h2 class="panel-heading text-center">Edit:- {{$user->first_name}}</h2>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('user/edit') }}">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" style="text-align: left;" style="text-align: left;" class="col-md-3 control-label">First name</label>

                            <div class="col-md-9">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name  }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="name" style="text-align: left;" class="col-md-3 control-label">Last Name</label>

                            <div class="col-md-9">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" style="text-align: left;" class="col-md-3 control-label">E-Mail Address</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email  }}"  required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" style="text-align: left;" class="col-md-3 control-label">Password</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" style="text-align: left;" class="col-md-3 control-label">Confirm Password</label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" style="text-align: left;" class="col-md-3 control-label">Gender</label>

                            <div class="col-md-9">  
                                    <select id="gender" name="gender" class="form-control" placeholder="gender" > 
                                        <optgroup label="Gender">
                                            <option value="male" {{ $user->gender == 'male'?'selected':''}} >Male</option>
                                            <option value="female" {{ $user->gender == 'female'?'selected':''}} >Female</option> 
                                        </optgroup>
                                    </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" style="text-align: left;" class="col-md-3 control-label">Date of Birth </label>

                            <div class="col-md-9">
                                <input id="date" type="date" class="form-control" name="date" value="{{ $user->date }}" >

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label for="bio" style="text-align: left;" class="col-md-3 control-label">Bio</label>

                            <div class="col-md-9">
                                <textarea id="bio" type="text" class="form-control" name="bio" required autofocus>{{ $user->bio }}</textarea>

                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

     


        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status" style="text-align: left;" class="col-md-3 control-label">Status</label>

            <div class="col-md-9">  
                    <select id="status" name="status" class="form-control" placeholder="status" disabled="disabled"> 
                        <optgroup label="Status">
                            <option value="active" {{ $user->status == 'active'?'selected':''}} >active</option>
                            <option value="inactive" {{ $user->status == 'inactive'?'selected':''}} >inactive</option> 
                        </optgroup>
                    </select>

                @if ($errors->has('status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div> 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
