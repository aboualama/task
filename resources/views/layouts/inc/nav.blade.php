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
					
						<li class="active"><a href="{{ url('/') }}" class="act">Home</a></li>	
					
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row"> 

								 	@foreach($all_categories as $category) 
									<div class="col-sm-3">
										<ul class="multi-column-dropdown"> 
											<h6>{{$category->name}}</h6> 
											@foreach($category->subcategories as $subcategory)				
												<li>
													<a href="/category/{{str_replace(' ','-', strtolower($subcategory->name))}}">	{{$subcategory->name}}
														
															{{-- @if( ) --}}
																<span>New</span>
															{{-- @endif --}}
														
													</a>
												</li> 
											@endforeach 
										</ul>
									</div> 
									@endforeach 





{{-- 									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Ethnic Wear</h6>
											<li><a href="salwars.html">Salwars</a></li>
											<li><a href="sarees.html">Sarees<span>New</span></a></li>
											<li><a href="products.html"><i>Summer Store</i></a></li>
										</ul>
									</div>
									<div class="col-sm-2">
										<ul class="multi-column-dropdown">
											<h6>Foot Wear</h6>
											<li><a href="sandals.html">Flats</a></li>
											<li><a href="sandals.html">Sandals</a></li>
											<li><a href="sandals.html">Boots</a></li>
											<li><a href="sandals.html">Heels</a></li>
										</ul>
									</div> --}}
									<div class="col-sm-3">
										<div class="w3ls_products_pos">
											<h4>50%<i>Off/-</i></h4>
											<img src="{{ asset('web') }}/images/1.jpg" alt=" " class="img-responsive" />
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>

						<li><a href="{{url('/test')}}">test</a></li>
						
						@if($page_setting == 'active')
							@foreach($thepages as $pages)
	                        	<li><a href="/page/{{ str_replace(' ','-', strtolower($pages->title)) }}">{{ $pages->title }}</a></li> 
	                    	@endforeach 
						@endif
						
						@if($contact_setting == 'active')
							<li><a href="{{url('/contact')}}">Mail Us</a></li>
						@endif
					
					</ul>
				</div>
			</nav>
		</div>
	</div>
<!-- //header -->
