@extends('layouts.app')

@section('keywords')
 {{ $page->keywords }} 
@endsection

@section('description')
 {{ $page->description }}
@endsection

@section('title')
 {{ $page->title }}
@endsection

@section('content')


 @foreach($Cat as $catt) 

 {{ $catt }}

 @endforeach


<!-- banner -->
    <div class="banner10" id="home1">
        <div class="container">
            <h2>{{ $page->title }}</h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li> 


   @foreach($Cat->take(5) as $subcategory)
                        <li> 
                            <a href="/category/{{str_replace(' ','-', strtolower($subcategory->name))}}">   {{$subcategory->name}} 
                            </a> 
                        </li> 
                    @endforeach 


</li>
            </ul>
        </div>
    </div> 
<!-- //breadcrumbs -->

 

    <div class="container"> 
    
        {!! $page->body  !!} 
    
    </div>
     

 


 
@endsection
