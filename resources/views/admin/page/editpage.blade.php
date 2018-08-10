@extends('admin.inc.layouts')

@section('title')
 Edit Page

@endsection


 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Page

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Page</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Page - {{ $page->title }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error') 

            {!! Form::open(['url' => 'admin/page/edit/'.$page->id , 'class' => 'form-group']) !!}
                {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class=" control-label">Page Title</label>
                            <div class=" ">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $page->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                            <label for="keywords" class=" control-label">Page Keywords</label>
                            <div class=" ">
                                <input id="keywords" type="text" class="form-control" name="keywords" value="{{ $page->keywords }}" required autofocus>

                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class=" control-label">Page Description</label>

                            <div class=" ">
                                <textarea id="description" type="text" class="form-control" name="description" value="" required autofocus>{{ $page->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class=" control-label">Page Body</label>

                            <div class=" ">
                                <textarea id="body" type="text" class="form-control ckeditor" name="body" value="" required autofocus>{{ $page->body }}</textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
 

                        <div class="form-group">
                            {!! Form::submit('Edit Page', ['class' => 'form-control btn btn-block btn-success']) !!}
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
