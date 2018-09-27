@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')


 <!-- banner -->
    <div class="banner" id="home1">
        <div class="container">
            <h3>fashions fade, <span>style is eternal</span></h3>
        </div>
    </div>
<!-- //banner -->
 

<!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="col-md-5 wthree_banner_bottom_left">
                <div class="video-img">
                    <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
                        <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- pop-up-box -->    
                        <link href="{{ asset('web') }}/css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
                        <script src="{{ asset('web') }}/js/jquery.magnific-popup.js" type="text/javascript"></script>
                    <!--//pop-up-box -->
                    <div id="small-dialog" class="mfp-hide">
                        <iframe src="https://player.vimeo.com/video/23259282?title=0&byline=0&portrait=0"></iframe>
                    </div>
                    <script>
                        $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });
                                                                                        
                        });
                    </script>
            </div>

 
        <div class="col-md-7 wthree_banner_bottom_right">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    
                    <li role="presentation" class="active"><a href="#{{ $a_category->id }}" id="{{ $a_category->id }}-tab" role="tab" data-toggle="tab" aria-controls="home-tab">{{ first_word($a_category->name)   }}</a></li>
                    
                    <li role="presentation"><a href="#{{ $b_category->id }}" role="tab" id="{{ $b_category->id }}-tab" data-toggle="tab" aria-controls="{{ $b_category->name }}">{{ first_word($b_category->name) }}</a></li>
                    
                    <li role="presentation"><a href="#{{ $c_category->id }}" role="tab" id="{{ $c_category->id  }}-tab" data-toggle="tab" aria-controls="{{ $c_category->name }}">{{ first_word($c_category->name)  }}</a></li>
                    
                    <li role="presentation"><a href="#{{ $d_category->id  }}" role="tab" id="{{$d_category->id}}-tab" data-toggle="tab" aria-controls="{{ $d_category->name  }}">{{ first_word($d_category->name)  }}</a></li>
                    
                    <li role="presentation"><a href="#{{ $e_category->id  }}" role="tab" id="{{ $e_category->id  }}-tab" data-toggle="tab" aria-controls="{{ $e_category->name  }}">{{ first_word($e_category->name)  }}</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">


                    <div role="tabpanel" class="tab-pane fade active in" id="{{ $a_category->id }}" aria-labelledby="home-tab">
                        <div class="agile_ecommerce_tabs">

                            @foreach($a_category->products->take(3) as $a_tap_pro)
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div style="position: relative;  margin: 0 auto; overflow: hidden;">
                                    <img src="{{ asset('/') }}/uploads/product/{{$a_tap_pro->photo}}"  class="img-responsive" /> 
                                    <div class="w3_hs_bottom">
                                        <ul>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModa{{$a_tap_pro->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="{{url('product')}}/{{$a_tap_pro->id}}">{{$a_tap_pro->name}} </a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$320</span> <i class="item_price">${{$a_tap_pro->price}}</i></p>
                                    <p><a class="item_add" href="{{url('cart/add')}}/{{$a_tap_pro->id}}">Add to cart</a></p>
                                </div>
                            </div>
                            @endforeach


                            <div class="clearfix"> </div>
                        </div>
                    </div>


                    <div role="tabpanel" class="tab-pane fade" id="{{ $b_category->id }}" aria-labelledby="{{ $b_category->name }}">
                        <div class="agile_ecommerce_tabs">

                            @foreach($b_category->products->take(3) as $b_tap_pro)
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div  style="position: relative;  margin: 0 auto; overflow: hidden;">
                                    <img src="{{ asset('/') }}/uploads/product/{{$b_tap_pro->photo}}" alt=" " class="img-responsive" /> 
                                    <div class="w3_hs_bottom">
                                        <ul>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModa{{$b_tap_pro->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="{{url('product')}}/{{$b_tap_pro->id}}">{{$b_tap_pro->name}} </a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$320</span> <i class="item_price">${{$b_tap_pro->price}}</i></p>
                                    <p><a class="item_add" href="{{url('cart/add')}}/{{$b_tap_pro->id}}">Add to cart</a></p>
                                </div>
                            </div>
                            @endforeach


                            <div class="clearfix"> </div>
                        </div>
                    </div>


                    <div role="tabpanel" class="tab-pane fade" id="{{$c_category->id}}" aria-labelledby="{{ $c_category->name }}">
                        <div class="agile_ecommerce_tabs">

                            @foreach($c_category->products->take(3) as $c_tap_pro)
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div  style="position: relative;  margin: 0 auto; overflow: hidden;">
                                    <img src="{{ asset('/') }}/uploads/product/{{$c_tap_pro->photo}}" alt=" " class="img-responsive" /> 
                                    <div class="w3_hs_bottom">
                                        <ul>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModa{{$c_tap_pro->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="{{url('product')}}/{{$c_tap_pro->id}}">{{$c_tap_pro->name}} </a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$320</span> <i class="item_price">${{$c_tap_pro->price}}</i></p>
                                    <p><a class="item_add" href="{{url('cart/add')}}/{{$c_tap_pro->id}}">Add to cart</a></p>
                                </div>
                            </div>
                            @endforeach


                            <div class="clearfix"> </div>
                        </div>
                    </div>


                    <div role="tabpanel" class="tab-pane fade" id="{{$d_category->id}}" aria-labelledby="{{ $d_category->name }}">
                        <div class="agile_ecommerce_tabs">

                            @foreach($d_category->products->take(3) as $d_tap_pro)
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div  style="position: relative;  margin: 0 auto; overflow: hidden;">
                                    <img src="{{ asset('/') }}/uploads/product/{{$d_tap_pro->photo}}" alt=" " class="img-responsive" /> 
                                    <div class="w3_hs_bottom">
                                        <ul>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModa{{$d_tap_pro->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="{{url('product')}}/{{$d_tap_pro->id}}">{{$d_tap_pro->name}} </a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$320</span> <i class="item_price">${{$d_tap_pro->price}}</i></p>
                                    <p><a class="item_add" href="{{url('cart/add')}}/{{$d_tap_pro->id}}">Add to cart</a></p>
                                </div>
                            </div>
                            @endforeach


                            <div class="clearfix"> </div>
                        </div>
                    </div>


                    <div role="tabpanel" class="tab-pane fade" id="{{$e_category->id}}" aria-labelledby="{{ $e_category->name }}">
                        <div class="agile_ecommerce_tabs">

                            @foreach($e_category->products->take(3) as $e_tap_pro)
                            <div class="col-md-4 agile_ecommerce_tab_left">
                                <div  style="position: relative;  margin: 0 auto; overflow: hidden;">
                                    <img src="{{ asset('/') }}/uploads/product/{{$e_tap_pro->photo}}" alt=" " class="img-responsive" /> 
                                    <div class="w3_hs_bottom">
                                        <ul>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModa{{$e_tap_pro->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="{{url('product')}}/{{$e_tap_pro->id}}">{{$e_tap_pro->name}} </a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>$320</span> <i class="item_price">${{$e_tap_pro->price}}</i></p>
                                    <p><a class="item_add" href="{{url('cart/add')}}/{{$e_tap_pro->id}}">Add to cart</a></p>
                                </div>
                            </div>
                            @endforeach


                            <div class="clearfix"> </div>
                        </div>
                    </div>


                </div>
            </div>


            <!--modal -->
                @foreach($a_category->products->take(3) as $a_tap_pro) 
                    <div class="modal video-modal fade" id="myModa{{$a_tap_pro->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$a_tap_pro->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                                </div>
                                <section>
                                    <div class="modal-body">
                                        <div class="col-md-5 modal_body_left">
                                            <img src="{{ asset('/') }}/uploads/product/{{$a_tap_pro->photo}}" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="col-md-7 modal_body_right">
                                            <h4>a good look women's shirt</h4>
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
                                                <p><a class="item_add" href="#">Add to cart {{$a_tap_pro->id}}</a></p>
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

                @foreach($b_category->products->take(3) as $b_tap_pro) 
                    <div class="modal video-modal fade" id="myModa{{$b_tap_pro->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$b_tap_pro->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                                </div>
                                <section>
                                    <div class="modal-body">
                                        <div class="col-md-5 modal_body_left">
                                            <img src="{{ asset('/') }}/uploads/product/{{$b_tap_pro->photo}}" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="col-md-7 modal_body_right">
                                            <h4>a good look women's shirt</h4>
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
                                                <p><a class="item_add" href="#">Add to cart {{$b_tap_pro->id}}</a></p>
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

                @foreach($c_category->products->take(3) as $c_tap_pro) 
                    <div class="modal video-modal fade" id="myModa{{$c_tap_pro->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$c_tap_pro->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                                </div>
                                <section>
                                    <div class="modal-body">
                                        <div class="col-md-5 modal_body_left">
                                            <img src="{{ asset('/') }}/uploads/product/{{$c_tap_pro->photo}}" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="col-md-7 modal_body_right">
                                            <h4>a good look women's shirt</h4>
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
                                                <p><a class="item_add" href="#">Add to cart {{$c_tap_pro->id}}</a></p>
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

                @foreach($d_category->products->take(3) as $d_tap_pro) 
                    <div class="modal video-modal fade" id="myModa{{$d_tap_pro->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$d_tap_pro->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                                </div>
                                <section>
                                    <div class="modal-body">
                                        <div class="col-md-5 modal_body_left">
                                            <img src="{{ asset('/') }}/uploads/product/{{$d_tap_pro->photo}}" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="col-md-7 modal_body_right">
                                            <h4>a good look women's shirt</h4>
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
                                                <p><a class="item_add" href="#">Add to cart {{$d_tap_pro->id}}</a></p>
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

                @foreach($e_category->products->take(3) as $e_tap_pro) 
                    <div class="modal video-modal fade" id="myModa{{$e_tap_pro->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$e_tap_pro->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                                </div>
                                <section>
                                    <div class="modal-body">
                                        <div class="col-md-5 modal_body_left">
                                            <img src="{{ asset('/') }}/uploads/product/{{$e_tap_pro->photo}}" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="col-md-7 modal_body_right">
                                            <h4>a good look women's shirt</h4>
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
                                                <p><a class="item_add" href="#">Add to cart {{$e_tap_pro->id}}</a></p>
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

 
                 
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //Tab-bottom -->

<!-- banner-bottom1 -->
    <div class="banner-bottom1">
        <div class="agileinfo_banner_bottom1_grids">
            <div class="col-md-7 agileinfo_banner_bottom1_grid_left">
                <h3>Grand Opening Event With flat<span>20% <i>Discount</i></span></h3>
                <a href="products.html">Shop Now</a>
            </div>
            <div class="col-md-5 agileinfo_banner_bottom1_grid_right">
                <h4>hot deal</h4>
                <div class="timer_wrap">
                    <div id="counter"> </div>
                </div>
                <script src="{{ asset('web') }}/js/jquery.countdown.js"></script>
                <link href="{{ asset('web') }}/css/jquery.countdown.css" rel="stylesheet" type="text/css" media="all" />
                <script src="{{ asset('web') }}/js/script.js"></script>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //banner-bottom1 -->

<!-- special-deals -->
    <div class="special-deals">
        <div class="container">
            <h2>Special Deals</h2>
            <div class="w3agile_special_deals_grids">
                <div class="col-md-7 w3agile_special_deals_grid_left">
                    <div class="w3agile_special_deals_grid_left_grid">
                        <img src="{{ asset('web') }}/images/26.jpg" alt=" " class="img-responsive" />
                        <div class="w3agile_special_deals_grid_left_grid_pos1">
                            <h5>30%<span>Off/-</span></h5>
                        </div>
                        <div class="w3agile_special_deals_grid_left_grid_pos">
                            <h4>We Offer <span>Best Products</span></h4>
                        </div>
                    </div>
                    <div class="wmuSlider example1">
                        <div class="wmuSliderWrapper">
                            <article style="position: absolute; width: 100%; opacity: 0;"> 
                                <div class="banner-wrap">
                                    <div class="w3agile_special_deals_grid_left_grid1">
                                        <img src="{{ asset('web') }}/images/1.png" alt=" " class="img-responsive" />
                                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
                                            velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
                                            eum fugiat quo voluptas nulla pariatur</p>
                                        <h4>Laura</h4>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;"> 
                                <div class="banner-wrap">
                                    <div class="w3agile_special_deals_grid_left_grid1">
                                        <img src="{{ asset('web') }}/images/2.png" alt=" " class="img-responsive" />
                                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
                                            velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
                                            eum fugiat quo voluptas nulla pariatur</p>
                                        <h4>Michael</h4>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;"> 
                                <div class="banner-wrap">
                                    <div class="w3agile_special_deals_grid_left_grid1">
                                        <img src="{{ asset('web') }}/images/3.png" alt=" " class="img-responsive" />
                                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
                                            velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
                                            eum fugiat quo voluptas nulla pariatur</p>
                                        <h4>Rosy</h4>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                        <script src="{{ asset('web') }}/js/jquery.wmuSlider.js"></script> 
                        <script>
                            $('.example1').wmuSlider();         
                        </script> 
                </div>
                <div class="col-md-5 w3agile_special_deals_grid_right">
                    <img src="{{ asset('web') }}/images/25.jpg" alt=" " class="img-responsive" />
                    <div class="w3agile_special_deals_grid_right_pos">
                        <h4>Women's <span>Special</span></h4>
                        <h5>save up <span>to</span> 30%</h5>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
<!-- //special-deals -->
<!-- new-products --> 

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
                                        <a href="{{$newproduct->name}}" data-toggle="modal" data-target="#newModal{{$newproduct->id}}">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h5><a href="{{url('product')}}/{{$newproduct->id}}">{{$newproduct->name}}</a></h5>
                            <div class="simpleCart_shelfItem">
                                <p class="flexisel_ecommerce_cart"><span>$312</span> <i class="item_price">${{$newproduct->price}}</i></p>
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
{{-- modal for new products --}}

    @foreach($new_products as $newproduct) 
    <div class="modal video-modal fade" id="newModal{{$newproduct->id}}" tabindex="-1" role="dialog" aria-labelledby="newModal{{$newproduct->id}}">
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
                            <h4> {{$newproduct->name}}</h4>
                            <p>{{$newproduct->description}}. </p>
   
                            <div class="modal_body_right_cart simpleCart_shelfItem">
                                <p><span>$3110</span> <i class="item_price">${{$newproduct->price}}</i></p>
                                <p><a class="item_add" href="{{url('cart/add')}}/{{$newproduct->id}}">Add to cart </a></p>
                            </div> 
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @endforeach

<!-- //new-products -->
<!-- top-brands -->
    <div class="top-brands">
        <div class="container">
            <h3>Top Brands</h3>
            <div class="sliderfig">
                <ul id="flexiselDemo1">   
                    @foreach($all_brands as $brand)
                    <li> 
                        <a href="{{ url('/brand')}}/{{slug($brand->name)}}">
                            <img src="{{ asset('/') }}/uploads/brand/{{ $brand->img }}" alt=" " class="img-responsive" />
                        </a> 
                    </li> 
                    @endforeach

                </ul>
            </div>
                    <script type="text/javascript">
                            $(window).load(function() {
                                $("#flexiselDemo1").flexisel({
                                    visibleItems: 4,
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
<!-- //top-brands -->

 
 
@endsection
