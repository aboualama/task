 

    <div class="header">
        <div class="container">

        @if($registration_setting == 'active')
            @guest

                <div class="w3l_login">
                    <a href="#" data-toggle="modal" data-target="#myModallogin">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a>
                </div>       

            @endguest 
        @endif            

            <div class="w3l_logo">
                <h1><a href="{{url('/')}}">Women's Fashion<span>For Fashion Lovers</span></a></h1>
            </div>
            <div class="search">
                <input class="search_box" type="checkbox" id="search_box">
                <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                <div class="search_form">
                    <form  action="{{url('/products/search')}}" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="search" placeholder="Search...">
                        <input type="submit" value="Send">
                    </form>
                </div>
            </div>
            <div class="cart box_1">
                <a href="{{url('/cart')}}">
                    <div class="total">
                    <span>${{Cart::total()}}</span> ({{Cart::count() }} items)</div>   {{-- without Tax Cart::subtotal(); --}}
                    <img src="{{ asset('web') }}/images/bag.png" alt="" />
                </a>
                <p><a href="{{url('/cart/destroy')}}" class="simpleCart_empty">Empty Cart</a></p>
                <div class="clearfix"> </div>
            </div>  
            <div class="clearfix"> </div>
        </div>
    </div>