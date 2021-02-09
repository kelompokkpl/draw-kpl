	<!-- Sidebar -->
	<aside class="sidebar">
      	<div class="toggle">
        	<a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              	<span></span>
            </a>
      	</div>
      	<div class="side-inner">        
	        <div class="nav-menu text-left">
	        	<ul id="menu-sidebar">
		            <li class="menu-item{{(Str::contains(URL::current(), 'dashboard_event/draw')) ? ' active' : '' }}" value="draw"><a href="{{URL::to('eo/dashboard_event/draw')}}">New Draw</a></li>
		            <li class="menu-item{{(Str::contains(URL::current(), 'dashboard_event/recent')) ? ' active' : '' }}" value="recent"><a href="{{URL::to('eo/dashboard_event/recent')}}">Recent Draw</a></li>
		            <li class="menu-item{{(Str::contains(URL::current(), 'dashboard_event/history')) ? ' active' : '' }}" value="history"><a href="{{URL::to('eo/dashboard_event/history')}}">Draw History</a></li>
	        	</ul>
	        </div>
    	</div>  
    </aside>
	<!-- End of Sidebar -->

	<script type="text/javascript">
		var menu_url = {!! json_encode(URL::to('eo/dashboard_event/')) !!}
	</script>
	
<!-- Main Content -->
	<div class="main-content">
		<!-- Main -->
		<div class="main text-center font-weight-bold">
			<div class="main-head">
				<h2 class="bold mb-0">New Draw</h2>
				<hr class="line-title col-md-3 mt-2"></hr>
				Scroll and choose one category and click Draw!
			</div>

			<div class="main-body text-center">
				<div class="wrap-container" id="wrap-scroll">
				    <ul id="ul-scroll">
				    	@foreach ($category as $row)
					    	<li class="{{($loop->index == 0)?'selected':''}}" value="{{$row->id}}" tabindex="-1"> <span class="item">{{$row->name}} </span> </li>
					    @endforeach
				    </ul>
				</div>

				<!-- Mask -->
				<svg>
					<defs>
						<linearGradient id="gradient" x1="0" y1="0%" x2 ="0" y2="50%">
					  		<stop stop-color="black" offset="0"/>
					  		<stop stop-color="white" offset="1"/>
						</linearGradient>
						<mask id="masking" maskUnits="objectBoundingBox" maskContentUnits="objectBoundingBox">
					  		<rect y="0" width="1" height="1" fill="url(#gradient)" />
						</mask>
					</defs>
				</svg> 

			</div>

			<div class="main-footer">
				<button class="draw-btn draw-btn-lg" onclick="goToDraw()">Draw</button>
			</div>
		</div>
		<!-- End of Main -->
	</div>
<!-- End of Main Content -->
<script type="text/javascript">
	var url = {!! json_encode(URL::to('/eo/dashboard_event/recentt')) !!};
</script>