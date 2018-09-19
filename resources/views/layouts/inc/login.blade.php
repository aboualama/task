    
<body>
<!-- header -->
 
    @guest

    <div class="modal fade" id="myModallogin" tabindex="-1" role="dialog" aria-labelledby="myModal88"
        aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;</button>
                    <h4 class="modal-title" id="myModalLabel">
                        Don't Wait, Login now!</h4>
                </div>
                <div class="modal-body modal-body-sub">
                    <div class="row">
                        <div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
                            <div class="sap_tabs">  
                                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                                    <ul>
                                        <li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
                                        <li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
                                    </ul>      




                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                    <div class="facts">
                                        <div class="register">
                                            <form action="{{ URL('login') }}" method="post">  
                                                {{ csrf_field() }}       
                                                <input name="email" placeholder="Email Address" type="email" required="">                        
                                                <input name="password" placeholder="Password" type="password" required="">                                      
                                                <div class="sign-up">
                                                    <input type="submit" value="Sign in"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div> 
                                </div>   

                                <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
                                    <div class="facts">
                                        <div class="register">
                                            <form   method="post" action="{{ URL('register') }}">
                                                {{ csrf_field() }}     

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input placeholder="First Name" name="first_name" type="text" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input placeholder="Last Name" name="last_name" type="text" required="">
                                                    </div>
                                                </div>    

                                                <input placeholder="Email Address" name="email" type="email" required="">        
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input placeholder="Password" name="password" type="password" >  
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input placeholder="Confirm Password" name="password_confirmation" type="password">
                                                    </div>
                                                </div>  

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input placeholder="Password" name="date" type="date" 
                                                          style="background: #f5f5f5; margin-top: 14px; padding: 0 10px; 
                                                               width: 100%; border: 1px solid #DFDFDF;line-height: 38px;">  
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select id="status" name="gender" class="form-control" placeholder="    status" style="width: 100%; background: #f5f5f5; margin-top: 14px; padding: 0 10px; border: 1px solid #DFDFDF; height: 42px;border-radius: inherit; box-shadow: none;" > 
                                                            <option selected>Gender ...</option> 
                                                            <option value="male" >-- Male</option>
                                                            <option value="female" >-- Female</option>     
                                                        </select>
                                                    </div>
                                                </div> 

                                             <input placeholder="Bio" name="bio" type="text" required="" style="margin-top:14px;">

                                                <div class="sign-up">
                                                    <input type="submit" value="Create Account"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>                                                            
                                </div>  
                            </div>
                            <script src="{{ asset('web') }}/js/easyResponsiveTabs.js" type="text/javascript"></script>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#horizontalTab').easyResponsiveTabs({
                                        type: 'default', //Types: default, vertical, accordion           
                                        width: 'auto', //auto or any width like 600px
                                        fit: true   // 100% fit in a container
                                    });
                                });
                            </script>
                            <div id="OR" class="hidden-xs">
                                OR</div>
                        </div>
                        <div class="col-md-4 modal_body_right modal_body_right1">
                            <div class="row text-center sign-with">
                                <div class="col-md-12">
                                    <h3 class="other-nw">
                                        Sign in with</h3>
                                </div>
                                <div class="col-md-12">
                                    <ul class="social">
                                        <li class="social_facebook"><a href="{{url('login/facebook')}}" class="entypo-facebook"></a></li>
                                        <li class="social_dribbble"><a href="{{url('login/google')}}" class="entypo-dribbble"></a></li>
                                        <li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
                                        <li class="social_behance"><a href="#" class="entypo-behance"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // $('#myModal88').modal('show');
    </script>

    @else   

    {{-- user section --}}
 
    <ul style= "position: relative; top: 35px; left: 50px; float: left;" >
        <li class="dropdown" style= " border: 1px solid #eee; padding: 10px;  list-style: none;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre style= " color: #ff9b05; text-decoration: none">
                {{ Auth::user()->first_name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" style= "position: absolute; top: 40px; left: -1px; box-shadow: none; border: 1px solid #eee; border-radius: inherit; ">
                <li><a href="{{ url('/user/edit') }}">Edit</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>

 </ul>
    @endguest 

 
