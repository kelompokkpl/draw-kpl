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
	
<style type="text/css">
	@if($event->background_new_draw!='')
		.main{ background-image: url("{{asset('assets/uploads/background'.'/'.$event->background_new_draw)}}"); }
	@endif
</style>

	<!-- Main Content -->
	<div class="main-content">
		<!-- Main -->
		<div class="main text-center font-weight-bold">
			<div class="main-head">
				<h1 class="mb-0">{{Session::get('category_name')}}</h1>
				<hr class="line-title col-md-3 mt-2"></hr>
			</div>

			<div class="main-body text-center">
				<!-- Draw Button -->
				<img src="{{($event->button_image=='')?asset('assets/image/img_draw_button.png'):asset('assets/uploads/button'.'/'.$event->button_image)}}" class="draw" onclick="goToDraw()">
			</div>

			<div class="main-footer mt-4">
				<h4 class="text-uppercase">Draw and find the winner!</h4>
			</div>
		</div>
		<!-- End of Main -->
	</div>
	<!-- End of Main Content -->

<script type="text/javascript">
	var drawing_url = {!! json_encode(URL::to('/eo/dashboard_event/drawingg')) !!};
</script>