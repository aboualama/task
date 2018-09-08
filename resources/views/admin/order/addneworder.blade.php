@extends('admin.inc.layouts')

@section('title')
 Create Subcategory  

@endsection


 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Subcategory

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Subcategory</a></li> 
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Add New Subcategory</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error')

            {!! Form::open(['url' => 'admin/subcategory', 'class' => 'form-group' , 'files' => true]) !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">Subcategory Name</label>
                            <div class=" ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class=" control-label">Subcategory description</label>
                            <div class=" ">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                            <label for="keywords" class=" control-label">Subcategory keywords</label>
                            <div class=" ">
                                <input id="keywords" type="text" class="form-control" name="keywords" value="{{ old('keywords') }}" required autofocus>

                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
         
                        
                        <div class="form-group">
                            {!! Form::label('Category') !!}
                              <select  class="form-control" name="category_id"> 
                                <option selected>Choose...</option>

                                    @foreach($all_categories as $category)    
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>  
                                    @endforeach 

                              </select> 
                        </div>

                        <div class="form-group">
                            {!! Form::label('Subcategory Image') !!}
                            {!! Form::file('img', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group{{ $errors->has('r_title') ? ' has-error' : '' }}">
                            <label for="r_title" class=" control-label">Right Title</label>
                            <div class=" "> 
                                <textarea id="r_title" type="text" class="form-control ckeditor" name="r_title" value="{{ old('l_title') }}" >  </textarea>

                                @if ($errors->has('r_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('r_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            {!! Form::label('Right Image') !!}
                            {!! Form::file('r_img', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group{{ $errors->has('l_title') ? ' has-error' : '' }}">
                            <label for="l_title" class=" control-label">Left Title</label>
                            <div class=" "> 
                                <textarea id="l_title" type="text" class="form-control ckeditor" name="l_title" value="{{ old('l_title') }}" >  </textarea>
                                @if ($errors->has('l_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('l_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            {!! Form::label('Left Image') !!}
                            {!! Form::file('l_img', ['class' => 'form-control']) !!}
                        </div>
 

 

                        <div class="form-group">
                            {!! Form::submit('Add New Subcategory', ['class' => 'form-control btn btn-block btn-success']) !!}
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
