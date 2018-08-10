@extends('admin.inc.layouts')

@section('title')
 Create Category  

@endsection


 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Category

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Category</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Add New Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')

            {!! Form::open(['url' => 'admin/category', 'class' => 'form-group']) !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">Category Name</label>
                            <div class=" ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         
 

                        <div class="form-group">
                            {!! Form::submit('Add New Category', ['class' => 'form-control btn btn-block btn-success']) !!}
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
