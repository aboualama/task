 {!! Form::open(['method' => 'DELETE', 'url' => ['admin/category/delete', $id]]) !!}

 
    <div class="form-group">
        <div class=" ">
            <button type="submit" class="btn  btn-danger">
                <i class="fa fa-trash"></i>  
            </button>
        </div>
    </div>
{!! Form::close() !!}