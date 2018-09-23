@extends('admin.inc.layouts')

@section('title')
 Create Admin  

@endsection


 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Admin

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Admin</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Add New Admin</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')

            {!! Form::open(['url' => 'admin/admin', 'class' => 'form-group' , 'files' => true]) !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">admin Name</label>
                            <div class=" ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   




                          <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" name="email" value="{{ old('email') }}"  class="form-control" placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                            @endif
                          </div>
                     
                          <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" name="password"  class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                          </div>
                          <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" name="password_confirmation"  class="form-control" placeholder="Retype password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                          </div>

                          <div class="form-group has-feedback {{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <input type="file" name="avatar"   class="form-control" placeholder="avatar">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            @if ($errors->has('avatar'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('avatar') }}</strong>
                              </span>
                            @endif
                          </div>

 

                        <div class="form-group">
                            {!! Form::submit('Add New admin', ['class' => 'form-control btn btn-block btn-success']) !!}
                        </div>
                {!! Form::close() !!}
   
   
       </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
 

@endsection
