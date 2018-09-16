@extends('layouts.app')

@section('keywords')
 {{-- {{ $page->keywords }}  --}}
@endsection

@section('description')
 {{-- {{ $page->description }} --}}
@endsection

@section('title')
  All Products
@endsection

@section('content')


 
<!-- banner -->
    <div class="banner4" style="background-image:url({{asset('uploads/products')}}/ ); " id="home1">
        <div class="container">
            <h2>Women  <span>up to</span> Flat 40% <i>Discount</i></h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>All Products </li>
            </ul>
        </div>
    </div>
<!-- //breadcrumbs -->

<!-- dresses -->
    <div class="dresses">
        <div class="container">
            <div class="w3ls_dresses_grids"> 
                <div class="col-md-4 w3ls_dresses_grid_left">
                    <div class="w3ls_dresses_grid_left_grid">
                        <h3>Categories</h3>
                        <div class="w3ls_dresses_grid_left_grid_sub">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title asd">
                                    <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="colla\pseOne">
                                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>New Arrivals
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body panel_text">
                                    <ul>
                                        <li><a href="dresses.html">Dresses</a></li>
                                        <li><a href="sweaters.html">Sweaters</a></li>
                                        <li><a href="skirts.html">Shorts & Skirts</a></li>
                                        <li><a href="jeans.html">Jeans</a></li>
                                        <li><a href="shirts.html">Shirts</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title asd">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Foot Wear
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                   <div class="panel-body panel_text">
                                    <ul>
                                        <li><a href="sandals.html">Flats</a></li>
                                        <li><a href="sandals.html">Sandals</a></li>
                                        <li><a href="sandals.html">Boots</a></li>
                                        <li><a href="sandals.html">Heals</a></li>
                                        <li><a href="sandals.html">Shirts</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <ul class="panel_bottom">
                                <li><a href="products.html">Summer Store</a></li>
                                <li><a href="dresses.html">New In Clothing</a></li>
                                <li><a href="sandals.html">New In Shoes</a></li>
                                <li><a href="products.html">Latest Watches</a></li>
                            </ul>
                        </div>
                    </div>
              
                    <div class="w3ls_dresses_grid_left_grid">
                        <div class="dresses_img_hover">
                            <img src="{{ asset('web') }}/images/60.jpg" alt=" " class="img-responsive" />
                            <div class="dresses_img_hover_pos">
                                <h4>For Kids <span>40%</span><i>Discount</i></h4>
                            </div>
                        </div>
                    </div>
                </div>








            <div class="col-md-8 w3ls_dresses_grid_right">
                <div class="w3ls_dresses_grid_right_grid2">
                    <div class="w3ls_dresses_grid_right_grid2_left">
                        <h3>Showing Results: {{$results->lastItem()}}-{{$all_products->count()}}</h3> 
                    </div>
                    <div class="w3ls_dresses_grid_right_grid2_right">  
                        <ul style= "position: relative; margin-right: 15px; float: left;" >
                            <li class="dropdown" style= " border: 1px solid #eee; padding: 10px;  list-style: none;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre style= " color: #ff9b05; text-decoration: none">
                                   Default sorting<span class="caret"></span>
                                </a> 
                                <ul class="dropdown-menu" style= "position: absolute; top: 40px; left: -1px; box-shadow: none; border: 1px solid #eee; border-radius: inherit; ">
                                <li><a href="{{url('all-products')}}/1">Sort by popularity </a></li>
                                <li><a href="{{url('all-products')}}/2">Sort by average rating </a></li>
                                <li><a href="{{url('all-products')}}/3">Sort by newness</a></li>
                                <li><a href="{{url('all-products')}}/4">Sort by price: low to high</a></li>
                                <li><a href="{{url('all-products')}}/5">Sort by price: high to low</a></li> 
                                </ul>
                            </li> 
                        </ul>  
                    </div>
                    <div class="clearfix"> </div>
                </div>

{{-- products products --}}
                <div class="w3ls_dresses_grid_right_grid3">  

                    @foreach($products as $product)

                        <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
                            <div class="agile_ecommerce_tab_left dresses_grid">
                                <div class=" hs-wrapper2" style="position: relative;  margin: 0 auto; overflow: hidden;">
                                    <img src="{{ asset('uploads/product') }}/{{$product->photo}}" alt=" " class="img-responsive" /> 
                                    <div class="w3_hs_bottom w3_hs_bottom_sub1">
                                        <ul>
                                            <li>
                                                <a href="{{$product->name}}" data-toggle="modal" data-target="#myModal{{$product->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="{{url('product')}}/{{$product->id}}">{{$product->name}}</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$420</span> <i class="item_price">{{$product->price}}</i></p>
                                    <p><a class="item_add" href="{{url('cart/add')}}/{{$product->id}}">Add to cart</a></p>
                                </div>
                                <div class="dresses_grid_pos">
                                    <h6>New</h6>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                        <div class="clearfix"> </div>
                        <div class="text-center">{{ $products->links() }}</div> 
                    </div>   
                </div> 
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>   

{{-- 


                        <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
                            <div class="agile_ecommerce_tab_left dresses_grid">
                                <div class="hs-wrapper hs-wrapper2">
                                    <img src="{{ asset('web') }}/images/j2.jpg" alt=" " class="img-responsive" />
                                    <img src="{{ asset('web') }}/images/j3.jpg" alt=" " class="img-responsive" />
                                    <img src="{{ asset('web') }}/images/j4.jpg" alt=" " class="img-responsive" />
                                    <img src="{{ asset('web') }}/images/j5.jpg" alt=" " class="img-responsive" />
                                    <img src="{{ asset('web') }}/images/j6.jpg" alt=" " class="img-responsive" />
                                    <img src="{{ asset('web') }}/images/j7.jpg" alt=" " class="img-responsive" />
                                    <img src="{{ asset('web') }}/images/j8.jpg" alt=" " class="img-responsive" />
                                    <img src="{{ asset('web') }}/images/j9.jpg" alt=" " class="img-responsive" />
                                    <div class="w3_hs_bottom w3_hs_bottom_sub1">
                                        <ul>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="single.html">Gray Solid Chinos</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$320</span> <i class="item_price">$250</i></p>
                                    <p><a class="item_add" href="#">Add to cart</a></p>
                                </div>
                            </div>
                        </div>--}} 

{{-- modal for products products --}}

    @foreach($products as $product)
    <div class="modal video-modal fade" id="myModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$product->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                </div>
                <section>
                    <div class="modal-body">
                        <div class="col-md-5 modal_body_left">
                            <img src="{{ asset('web/images') }}/{{$product->photo}}" alt=" " class="img-responsive" />
                        </div>
                        <div class="col-md-7 modal_body_right">
                            <h4>a good look black women's jeans  {{$product->name}}</h4>
                            <p>{{$product->description}} . vv Duis aute irure dolor in 
                                reprehenderit in voluptate velit esse cillum dolore 
                                eu fugiat nulla pariatur. Excepteur sint occaecat 
                                cupidatat non proident, sunt in culpa qui officia 
                                deserunt mollit anim id est laborum.</p>
                            <div class="rating">
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star-.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star-.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star-.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="modal_body_right_cart simpleCart_shelfItem">
                                <p><span>$320</span> <i class="item_price">${{$product->price}}</i></p>
                                <p><a class="item_add" href="{{url('cart/add')}}/{{$product->id}}">Add to cart </a></p>
                            </div>
                            <h5>Color</h5>
                            <div class="color-quality">
                                <ul>
                                    <li><a href="#"><span></span>Red</a></li>
                                    <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                    <li><a href="#" class="purple"><span></span>Purple</a></li>
                                    <li><a href="#" class="gray"><span></span>Violet</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @endforeach




















{{-- related products --}}

    <div class="w3l_related_products">
        <div class="container">
            <h3>New Products</h3>
            <ul id="flexiselDemo2">  

                @foreach($new_products as $newproduct) 

                <li>
                    <div class="w3l_related_products_grid">
                        <div class="agile_ecommerce_tab_left dresses_grid">
                            <div class="hs-wrapper3" style="position: relative;  margin: 0 auto; overflow: hidden;"> 
                                <img src="{{ asset('web/images') }}/{{$newproduct->photo}}" alt=" " class="img-responsive" />
                                <div class="w3_hs_bottom">
                                    <div class="flex_ecommerce">
                                        <a href="{{$newproduct->name}}" data-toggle="modal" data-target="#myModal{{$newproduct->id}}">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h5><a href="{{url('product')}}/{{$newproduct->id}}">{{$newproduct->name}}</a></h5>
                            <div class="simpleCart_shelfItem">
                                <p class="flexisel_ecommerce_cart"><span>$312</span> <i class="item_price">$212</i></p>
                                <p><a class="item_add" href="{{url('cart/add')}}/{{$newproduct->id}}">Add to cart</a></p>
                            </div>
                        </div>      
                    </div>
                </li> 
                @endforeach
            </ul>
                <script type="text/javascript">
                    $(window).load(function() {
                        $("#flexiselDemo2").flexisel({
                            visibleItems:4,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 3000,            
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: { 
                                portrait: { 
                                    changePoint:480,
                                    visibleItems: 1
                                }, 
                                landscape: { 
                                    changePoint:640,
                                    visibleItems:2
                                },
                                tablet: { 
                                    changePoint:768,
                                    visibleItems: 3
                                }
                            }
                        });
                        
                    });
                </script>
                <script type="text/javascript" src="{{ asset('web') }}/js/jquery.flexisel.js"></script>
        </div>
    </div> 



{{-- modal for related products --}}

    @foreach($new_products as $newproduct) 
    <div class="modal video-modal fade" id="myModal{{$newproduct->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$newproduct->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                </div>
                <section>
                    <div class="modal-body">
                        <div class="col-md-5 modal_body_left">
                            <img src="{{ asset('web/images') }}/{{$newproduct->photo}}" alt=" " class="img-responsive" />
                        </div>
                        <div class="col-md-7 modal_body_right">
                            <h4>a good look women's {{$newproduct->name}}</h4>
                            <p>{{$newproduct->description}}.Duis aute irure dolor in 
                                reprehenderit in voluptate velit esse cillum dolore 
                                eu fugiat nulla pariatur. Excepteur sint occaecat 
                                cupidatat non proident, sunt in culpa qui officia 
                                deserunt mollit anim id est laborum.</p>
                            <div class="rating">
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star-.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star-.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star-.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="modal_body_right_cart simpleCart_shelfItem">
                                <p><span>$320</span> <i class="item_price">${{$newproduct->price}}</i></p>
                                <p><a class="item_add" href="{{url('cart/add')}}/{{$newproduct->id}}">Add to cart </a></p>
                            </div>
                            <h5>Color</h5>
                            <div class="color-quality">
                                <ul>
                                    <li><a href="#"><span></span>Red</a></li>
                                    <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                    <li><a href="#" class="purple"><span></span>Purple</a></li>
                                    <li><a href="#" class="gray"><span></span>Violet</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @endforeach

 

 
@endsection
