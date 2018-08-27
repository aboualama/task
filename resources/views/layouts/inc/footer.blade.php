<!-- newsletter -->
    <div class="newsletter" style="background: #ff9b05; padding: 1em 0;" >
 
        <hr style="width: 70%;  ">
{{--         <div class="container">
            <div class="col-md-6 w3agile_newsletter_left">
                <h3>Newsletter</h3>
                <p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
            </div>
            <div class="col-md-6 w3agile_newsletter_right">
                <form action="#" method="post">
                    <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <input type="submit" value="" />
                </form>
            </div>
            <div class="clearfix"> </div>
        </div> --}}
    </div>
<!-- //newsletter -->

<!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="w3_footer_grids">
                <div class="col-md-3 w3_footer_grid">
                    <h3>Contact</h3>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                    <ul class="address">
                        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><span>{{$footer_contact->address}}.</span></li>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><span><a href="mailto:{{$footer_contact->email}}">{{$footer_contact->email}}</a></span></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><span>+{{$footer_contact->phone}}</span></li>
                    </ul>
                </div>
                <div class="col-md-3 w3_footer_grid">
                    <h3>Information</h3> 
                    <ul class="info"> 
                    @if($page_setting == 'active')
                    @foreach($thepages as $pages)
                        <li>
                            <a href="/page/{{ str_replace(' ','-', strtolower($pages->title)) }}" class="{{ Request::is('page/*') ? 'act' : ''}}">{{ $pages->title }} 
                            </a>
                        </li> 
                    @endforeach 
                    @endif
                        
                    @if($contact_setting == 'active')
                        <li><a href="{{url('/contact')}}" class="{{ Request::is('contact') ? 'act' : ''}}">Mail Us</a></li>
                    @endif 
                    </ul>
                </div>
                <div class="col-md-3 w3_footer_grid"> 
                    <h3>Category</h3>
                    <ul class="info"> 
                    @if($subcategory_setting == 'active')
                    @foreach($all_subcategories->take(5) as $subcategory)
                        <li> 
                            <a href="/category/{{str_replace(' ','-', strtolower($subcategory->name))}}">   {{$subcategory->name}} 
                            </a> 
                        </li> 
                    @endforeach 
                    @endif
                    </ul>
                </div>
                <div class="col-md-3 w3_footer_grid">
                    <h3>Profile</h3>
                    <ul class="info">  

                        @if($registration_setting == 'active')
                        @guest
                            <li> <a href="#" data-toggle="modal" data-target="#myModallogin"> Sign In </a></li> 
                        @else  
                            <li><a href="{{url('/user/edit')}}">My Profile</a></li>
                        @endguest 
                        @endif  

                        <li><a href="{{url('/cart')}}">My Cart</a></li>
                    </ul>


                    @if($social_setting == 'active')
                    <h4>Follow Us</h4>
                    <div class="agileits_social_button">
                        <ul>
                            @foreach($sociallinks as $sociallink)
                                <li><a href="{{$sociallink->link}}" class="{{$sociallink->name}}"> </a></li>
                            @endforeach  
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer-copy">
            <div class="footer-copy1">
                <div class="footer-copy-pos">
                    <a href="#home1" class="scroll"><img src="{{ asset('web') }}/images/arrow.png" alt=" " class="img-responsive" /></a>
                </div>
            </div>
            <div class="container">
                <p>&copy; 2016 Women's Fashion. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
            </div>
        </div>
    </div>
<!-- //footer -->


@stack('js')


</body>
</html>