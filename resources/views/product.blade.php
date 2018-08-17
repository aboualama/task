@extends('layouts.app')

@section('keywords')
 {{-- {{ $page->keywords }}  --}}
@endsection

@section('description')
 {{-- {{ $page->description }} --}}
@endsection

@section('title')
 {{$product->name}}
@endsection

@section('content')

<!-- banner -->
    <div class="banner10" id="home1">
        <div class="container">
            <h2>{{$product->name}}</h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>{{$product->name}}</li>
            </ul>
        </div>
    </div>
<!-- //breadcrumbs -->
 <!-- single -->
    <div class="single">
        <div class="container">
            <div class="col-md-4 single-left">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="{{ asset('web') }}/images/a.jpg">
                            <div class="thumb-image"> <img src="{{ asset('web') }}/images/a.jpg" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{ asset('web') }}/images/b.jpg">
                             <div class="thumb-image"> <img src="{{ asset('web') }}/images/b.jpg" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{ asset('web') }}/images/c.jpg">
                           <div class="thumb-image"> <img src="{{ asset('web') }}/images/c.jpg" data-imagezoom="true" class="img-responsive"> </div>
                        </li> 
                    </ul>
                </div>
                <!-- flixslider -->
                    <script defer src="{{ asset('web') }}/js/jquery.flexslider.js"></script>
                    <link rel="stylesheet" href="{{ asset('web') }}/css/flexslider.css" type="text/css" media="screen" />
                    <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                      $('.flexslider').flexslider({
                        animation: "slide",
                        controlNav: "thumbnails"
                      });
                    });
                    </script>
                <!-- flixslider -->
                <!-- zooming-effect -->
                    <script src="{{ asset('web') }}/js/imagezoom.js"></script>
                <!-- //zooming-effect -->
            </div>
            <div class="col-md-8 single-right">
                <h3> {{$product->name}}</h3>
                <div class="rating1">
                    <span class="starRating">
                        <input id="rating5" type="radio" name="rating" value="5">
                        <label for="rating5">5</label>
                        <input id="rating4" type="radio" name="rating" value="4">
                        <label for="rating4">4</label>
                        <input id="rating3" type="radio" name="rating" value="3" checked>
                        <label for="rating3">3</label>
                        <input id="rating2" type="radio" name="rating" value="2">
                        <label for="rating2">2</label>
                        <input id="rating1" type="radio" name="rating" value="1">
                        <label for="rating1">1</label>
                    </span>
                </div>
                    <div class="description">
                        <h5><i>Description</i></h5>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut 
                            odit aut fugit, sed quia consequuntur magni dolores eos qui 
                            ratione voluptatem sequi nesciunt.</p>
                    </div>
                    <div class="color-quality">
                        <div class="color-quality-left">
                            <h5>Color : </h5>
                            <ul>
                                <li><a href="#"><span></span>Red</a></li>
                                <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                <li><a href="#" class="purple"><span></span>Purple</a></li>
                                <li><a href="#" class="gray"><span></span>Violet</a></li>
                            </ul>
                        </div>
                        <div class="color-quality-right">
                            <h5>Quality :</h5>
                             <div class="quantity"> 
                                <div class="quantity-select">                           
                                    <div class="entry value-minus1">&nbsp;</div>
                                    <div class="entry value1"><span>1</span></div>
                                    <div class="entry value-plus1 active">&nbsp;</div>
                                </div>
                            </div>
                            <!--quantity-->
                                    <script>
                                    $('.value-plus1').on('click', function(){
                                        var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                        divUpd.text(newVal);
                                    });

                                    $('.value-minus1').on('click', function(){
                                        var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                        if(newVal>=1) divUpd.text(newVal);
                                    });
                                    </script>
                                <!--quantity-->

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="occasional">
                        <h5>Occasion :</h5>
                        <div class="colr ert">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Occasion Wear</label>
                            </div>
                        </div>
                        <div class="colr">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Party Wear</label>
                            </div>
                        </div>
                        <div class="colr">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Formal Wear</label>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="simpleCart_shelfItem">
                            <p><span>$320</span> <i class="item_price">$250</i></p>
                            <p><a class="item_add" href="#">Add to cart</a></p>
                        </div>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="additional_info">
        <div class="container">
            <div class="sap_tabs">  
                <div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
                    <ul>
                        <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
                        <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
                    </ul>       
                    <div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
                        <h3>Swan Miami Red Skirt</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut 
                            odit aut fugit, sed quia consequuntur magni dolores eos qui 
                            ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum 
                            exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea 
                            commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate 
                            velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
                            quo voluptas nulla pariatur.</p>
                    </div>  

                    <div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
                        <h4>({{$product->comments->count()}}) Reviews</h4>
 
                    @foreach($product->comments()->paginate(5) as $comment)

                        <div class="additional_info_sub_grids">
                            <div class="col-xs-2 additional_info_sub_grid_left">
                                <img src="{{ asset('web') }}/images/2.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="col-xs-10 additional_info_sub_grid_right">
                                <div class="additional_info_sub_grid_rightl">
                                    <a href="#">{{  $comment->user['first_name'] }}</a>
                                    <h5>{{$comment->created_at->format('d-M-Y')}}.</h5>
                                    {{-- <h5>{{\Carbon\Carbon::parse($comment->created_at)->format('d-M-Y')}}.</h5> --}}
                                    <p>{{$comment->comment}}.</p>
                                </div>
 
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                    @endforeach
                    <div class="clearfix"></div>
                    <div class="pull-right">
                        {{ $product->comments()->paginate(5)->links() }} 
                    </div>
                    <div class="clearfix"></div>
                        <div class="review_grids">
                            <h5>Add A Review</h5>
                            <form action="{{url('admin')}}/a/comment" method="post">
                                {{ csrf_field() }}
                                {{-- <input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required=""> --}}
                                <input type="hidden" name="product_id" value="{{$product->id}}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
                                <textarea name="comment" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
                                <input type="submit" value="Submit" >
                            </form>
                        </div>
                    </div>                                                            
                </div>  
            </div>
            <script src="{{ asset('web') }}/js/easyResponsiveTabs.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab1').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion           
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
            </script>
        </div>
    </div>
    <div class="w3l_related_products">
        <div class="container">
            <h3>Related Products</h3>
            <ul id="flexiselDemo2">         


                @foreach($rel_products as $product)


                <li>
                    <div class="w3l_related_products_grid">
                        <div class="agile_ecommerce_tab_left dresses_grid">
                            <div class="hs-wrapper hs-wrapper3"> 
                                <img src="{{ asset('web/images') }}/{{$product->photo}}" alt=" " class="img-responsive"> 
                                <div class="w3_hs_bottom">
                                    <div class="flex_ecommerce">
                                        <a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                    </div>
                                </div>
                            </div>
                            <h5><a href="{{url('product')}}/{{$product->id}}">{{$product->name}} {{$product->subcategory->id}} </a></h5>
                            <div class="simpleCart_shelfItem">
                                <p class="flexisel_ecommerce_cart"><span>$312</span> <i class="item_price">${{$product->price}}</i></p>
                                <p><a class="item_add" href="#">Add to cart</a></p>
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
    <div class="modal video-modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModal6">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                </div>
                <section>
                    <div class="modal-body">
                        <div class="col-md-5 modal_body_left">
                            <img src="{{ asset('web') }}/images/39.jpg" alt=" " class="img-responsive" />
                        </div>
                        <div class="col-md-7 modal_body_right">
                            <h4>a good look women's Long Skirt</h4>
                            <p>Ut enim ad minim veniam, quis nostrud 
                                exercitation ullamco laboris nisi ut aliquip ex ea 
                                commodo consequat.Duis aute irure dolor in 
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
                                <p><span>$320</span> <i class="item_price">$250</i></p>
                                <p><a class="item_add" href="#">Add to cart</a></p>
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
<!-- //single -->
 
@endsection
