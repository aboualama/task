@extends('admin.inc.layouts')

@section('title')
 Edit comment

@endsection


 
@section('content')
<!-- Content Header (comment header) -->
<section class="content-header">
  <h1>
    Edit comment

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">comment</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit comment - {{ $comment->title }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error') 

            {!! Form::open(['url' => 'admin/comment/edit/'.$comment->id , 'class' => 'form-group']) !!}
                {{ method_field('PUT') }}

           
 


        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label for="status" class="form-contro control-label">Status</label>

            <div class="form-contro">  
                    <select id="status" name="status" class="form-control" placeholder="status" > 
                        <optgroup label="Status">
                            <option value="active" {{ $comment->status == 'active'?'selected':''}} >active</option>
                            <option value="inactive" {{ $comment->status == 'inactive'?'selected':''}} >inactive</option> 
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
                            {!! Form::submit('Edit comment', ['class' => 'form-control btn btn-block btn-success']) !!}
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
