@extends('admin.inc.layouts')

@section('title')
 Edit Setting 

@endsection


 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Setting 

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Setting</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Setting - {{ $setting->name  }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')

            {!! Form::open(['url' => 'admin/setting/edit/'.$setting->id , 'class' => 'form-group']) !!}
                {{ method_field('PUT') }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">Setting Name</label>
                            <div class=" ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $setting->name  }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class=" control-label">Description</label>

                            <div class=" ">
                                <textarea id="description" type="text" class="form-control" name="description" required autofocus>{{ $setting->description  }}
                                </textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="  control-label">Status</label>

                            <div class=" ">  
                                    <select id="status" name="status" class="form-control" placeholder="status" > 
                                        <optgroup label="Status">
                                            <option value="inactive" {{ $setting->status == ''?'selected':''}} >inactive</option> 
                                            <option value="active" {{ $setting->status == 'active'?'selected':''}} >active</option>
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
                            {!! Form::submit('Edit Setting', ['class' => 'form-control btn btn-block btn-success']) !!}
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
