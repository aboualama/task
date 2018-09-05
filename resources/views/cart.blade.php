@extends('layouts.app')

@section('keywords')
 {{-- {{ $page->keywords }}  --}}
@endsection

@section('description')
 {{-- {{ $page->description }} --}}
@endsection

@section('title')
 Checkout
@endsection

@section('content')


 
<!-- banner -->
    <div class="banner10" id="home1">
        <div class="container">
            <h2>Checkout</h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
<!-- //breadcrumbs -->
<!-- checkout -->

@if(cart::count() == 0 ) 
<h1 class="empty text-center" style="margin-top: 70px "> Cart Shopping Is Empty</h1>
@else
    <div class="checkout">
        <div class="container">
            <h3>Your shopping cart contains: <span>{{cart::count()}} Products</span></h3>
            <div class="alret">
                
                <div class="alert" style="display: none;" id ="masg" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Title!</strong> Alert body ...
                </div>
            </div>
            <div class="checkout-right">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th> 
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Service Charges</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                @foreach($cart_item as $cartItem)
                    <tr  class="tr{{$cartItem->id}}">
                        <td class="invert">{{$cartItem->id * 6241}}</td> 
                        <td class="invert-image">
                            <a href="{{url('product')}}/{{$cartItem->id}}">
                                <img src="{{ asset('web') }}/images/{{$cartItem->options->photo}}" alt=" " class="img-responsive" />
                            </a>
                        </td>
                        <td class="invert">
                             <div class="quantity"> 
                                <div class="quantity-select">                           
                                    <div class="entry qty{{$cartItem->id}} value-minus" >&nbsp;</div>
                                    <div class="entry value"" id="qty{{$cartItem->id}}"><span>{{$cartItem->qty}}</span></div>
                                    <div class="entry qty{{$cartItem->id}} value-plus active" >&nbsp;</div>
                                </div>
                            </div>
                        </td> 

                        <input type="hidden" id="rowId{{$cartItem->id}}" value="{{$cartItem->rowId }}">

                        <td class="invert">{{$cartItem->name}}</td>
                        <td class="invert" id="to{{$cartItem->id}}">{{$cartItem->qty}}</td>
                        <td class="invert" id="price{{$cartItem->id}}">${{$cartItem->price}}</td>
                        <td class="invert">
                              <form id="deleteform{{$cartItem->id}}" >
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                 
                <!--quantity-->
                    <script>
                    $('.value-plus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                        divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                        if(newVal>=1) divUpd.text(newVal);
                    });

                    </script>


                    <script>

                    $(document).ready(function() {  
                      $.ajaxSetup({
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                          }); 

                        @foreach($cart_item as $cartItem)  
                            $('.qty{{$cartItem->id}}').on( 'click' , (function() { 
                                var qty   = $('#qty{{$cartItem->id}}').text();
                                var rowId = $("#rowId{{$cartItem->id}}").val();
                                var price = $("#price{{$cartItem->id}}").text();  
                                $.ajax({
                                    url:  '{{url('/cart/update')}}',
                                    type: 'put', 
                                    data:  { qty: qty, rowId: rowId, }, 
                                    success: function(response)
                                        { 
                                            $('#to{{$cartItem->id}}').text(qty);
                                            $('#to1{{$cartItem->id}}').text(qty); 
                                        },  
                                    })  
                            }));   

                            $('#deleteform{{$cartItem->id}}').submit(function(event){
                                var rowId = $("#rowId{{$cartItem->id}}").val();
                                $.ajax({
                                    url:  '{{url('cart/delete') }}/{{$cartItem->rowId }}',
                                    type: 'delete', 
                                    data:  { rowId: rowId, },

                                    success: function(response)
                                        { 
                                            $(".tr{{$cartItem->id}}").fadeOut(2000); 
                                        }, 
  
                                    }) 
                                event.preventDefault() 
                            });  
                        @endforeach 
                    });

                    </script>
                <!--quantity-->
                </table>   
 

            </div>
            <div class="checkout-left"> 
                <div class="checkout-left-basket">
                    <h4>Continue to basket</h4>
                    <ul>
                        @foreach($cart_item as $cartItem)
                        <li class="tr{{$cartItem->id}}"><span style="width: 45%; float: left;">{{$cartItem->name}}</span> 
                            <i id="to1{{$cartItem->id}}">-( {{$cartItem->qty}} )-</i> 
                            <span> ${{$cartItem->price * $cartItem->qty }} </span> 
                        </li> 
                        @endforeach
                        <li class="cart-li-total" >Total Service Charges <i>-</i> <span>$ {{$charge}}</span></li>
                        <li>Total <i>-</i> <span>${!!Cart::subtotal(0, '','') + $charge !!}</span></li> 
                            {{-- Cart::subtotal(0, '','') or you can edit it from config cart --}}
                    </ul>       


                    @if($registration_setting == 'active')
                        @guest
                            You Must <a href="#" data-toggle="modal" data-target="#myModallogin"> Sign in </a> to Buy Now  
                        @else  
        
                        <form method="POST" action="{{ route('pay') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="price" value="{!!Cart::subtotal(0, '','') + $charge !!}" />
                        {{-- @foreach($cart_item as $cartItem)  --}}
                            <input type="hidden" name="name" value="{{$cart_item}}" />
                        {{-- @endforeach --}}
                            
                            <button class="paypal-button" type="submit">Buy Now</button>
                        </form> 
                    
                    @endguest 
                    @endif    

                </div>


@endif

                <div class="checkout-right-basket">
                    <a href="products.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                </div>


                
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>



                        <div class="clearfix"> </div>




    <div class="w3l_related_products">
        <div class="container">
            <h3>New Products</h3>
            <ul id="flexiselDemo2">       

                @foreach($new_products as $product)  
                <li>
                    <div class="w3l_related_products_grid">
                        <div class="agile_ecommerce_tab_left dresses_grid">
                            <div class="hs-wrapper3" style="position: relative;  margin: 0 auto; overflow: hidden;"> 
                                <img src="{{ asset('web/images') }}/{{$product->photo}}" alt=" " class="img-responsive"> 
                                <div class="w3_hs_bottom">
                                    <div class="flex_ecommerce">
                                        <a href="{{$product->name}}" data-toggle="modal" data-target="#myModal{{$product->id}}">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h5> <a href="{{url('product')}}/{{$product->id}}">{{$product->name}}</a> </h5>
                            <div class="simpleCart_shelfItem">
                                <p class="flexisel_ecommerce_cart"><span>$312</span> <i class="item_price">${{$product->price}}</i></p>
                                <p><a class="item_add" href="{{url('cart/add')}}/{{$product->id}}">Add to cart</a></p>
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
 
 @foreach($new_products as $product)
    <div class="modal video-modal fade" id="myModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal6">
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
                            <h4> {{$product->name}}</h4>
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
                                <p><a class="item_add" href="{{url('cart/add')}}/{{$product->id}}">Add to cart</a></p>
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
<!-- //checkout -->
 

 
@endsection
