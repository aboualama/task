@extends('admin.inc.layouts')

@section('title')
 Edit Product 

@endsection


 
@section('content')
<!-- Content Header (Product  header) -->
<section class="content-header">
  <h1>
    Edit Product 

    <small>Cpanel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li> 
    <li><a href="#">Product </a></li> 
  </ol>
</section>

<!-- Main content --> 
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit Product  - {{ $product ->name }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover"> 


            @include('errors.error') 

            {!! Form::open(['url' => 'admin/product/edit/'.$product->id , 'class' => 'form-group' , 'files' => true]) !!}
                {{ method_field('PUT') }}
 
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">Product Name</label>
                            <div class=" ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class=" control-label">Product description</label>
                            <div class=" ">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $product->description }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class=" control-label">Product price</label>
                            <div class=" ">
                                <input id="price" type="text" class="form-control" name="price" value="{{ $product->price }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        
                        <div class="form-group">
                            {!! Form::label('Category') !!}
                              <select  class="form-control" name="subcategory" > 
                                <option selected  value="{{ $product->subcategory->id }}">{{ $product->subcategory->name }}</option>

                                    @foreach($all_categories as $category)    
                                        <optgroup label="{{ $category->name }}  "> 
                                            @foreach($category->subcategories as $subcategory)    
                                                <option value="{{ $subcategory->id }}"> -- {{ $subcategory->name }}</option>  
                                            @endforeach  
                                    @endforeach 

                              </select> 
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('Brand') !!}
                              <select  class="form-control" name="brand"> 
                                <option selected value="{{ $product->brand->id }}">{{ $product->brand->name  }}</option>

                                    @foreach($all_brands as $brand)        
                                                <option value="{{ $brand->id }}"> -- {{ $brand->name }}</option>   
                                    @endforeach 

                              </select> 
                        </div>

                        <div class="form-group">
                            {!! Form::label('Product Image') !!}
                            {!! Form::file('photo', ['class' => 'form-control']) !!}
                        </div>
 

 

                        <div class="form-group">
                            {!! Form::submit('Add New Product', ['class' => 'form-control btn btn-block btn-success']) !!}
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
