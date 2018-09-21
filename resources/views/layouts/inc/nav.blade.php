 	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
					
						<li class="active"><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'act' : ''}}">Home</a></li>	
					
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class=" {{ Request::is('category/*') ? 'act' : ''}} dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row"> 

								 	@foreach($all_categories as $category) 
									<div class="{{$loop->index == 2 ? 'col-sm-2' : 'col-sm-3' }}">
										<ul class="multi-column-dropdown"> 
											<h6>{{$category->name}}</h6> 
											@foreach($category->subcategories as $subcategory)				
												<li>
													<a href="/category/{{slug($subcategory->name)}}">	{{$subcategory->name}}
														
															{{-- @if( ) --}}
																<span>New</span>
															{{-- @endif --}}
														
													</a>
												</li>  
											@endforeach 	
												@if($loop->index == 1)
													<li><a href="{{url('/all-products')}}"><i>Summer Store</i></a></li> 
												@endif
										</ul>
									</div> 
									@endforeach 



									<div class="col-sm-4">
										<div class="w3ls_products_pos">
											<h4>50%<i>Off/-</i></h4>
											<img src="{{ asset('web') }}/images/1.jpg" alt=" " class="img-responsive" />
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>

						{{-- <li><a href="{{url('/test')}}" class="{{ Request::is('test') ? 'act' : ''}}" >test</a></li> --}}
						
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
			</nav>
		</div>
	</div>
<!-- //header -->
