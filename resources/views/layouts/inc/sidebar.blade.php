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
                                        @foreach($all_subcategories as $subcategory)              
                                            <li>
                                                <a href="/category/{{slug($subcategory->name)}}">{{$subcategory->name}} 
                                                </a>
                                            </li> 
                                        @endforeach 
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
                                <li><a href="{{url('/all-products')}}">Summer Store</a></li>
                                <li><a href="{{url('all-products')}}/3">New In Clothing</a></li>
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
