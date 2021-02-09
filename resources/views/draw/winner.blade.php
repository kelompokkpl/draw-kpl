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
	.draw-btn{
		@if($event->button_background_color!='')
			background-color: {{$event->button_background_color}};
		@endif
		@if($event->button_text_color!='')
			color: {{$event->button_text_color}};
		@endif
		@if($event->button_shadow_color!='')
			box-shadow: 0 7px 10px 0 {{$event->button_shadow_color}};
  			-webkit-box-shadow: 0 7px 10px 0 {{$event->button_shadow_color}};
  			-moz-box-shadow: 0 7px 10px 0 {{$event->button_shadow_color}};
		@endif
	}
</style>

	<!-- Main Content -->
	<div class="main-content" id="main-content">

		<div class="head">
			<button class="draw-btn" onclick="goToDraw()">Re-draw</button>
		</div>

		<!-- Main -->
		<div class="main text-center font-weight-bold">
			<div class="main-head">
				<h1 class="mb-0">CONGRATULATIONS !</h1>
				<hr class="line-title col-md-2 mt-2"></hr>
			</div>

			<div class="row text-lato text-center">
				@foreach($winner as $row)
				<div class="col-md-3 mb-4 mx-auto">
					{{$row->name}}<br>
					<span class="text-lato-thin">{{$row->participant_id}}</span>
				</div>
				@endforeach
			</div>
		</div>
		
	</div>

	<script src="{{asset('assets/js/confetti.js')}}"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
	        startConfetti();
	        setInterval(stopConfetti,5000);
	    });
	</script>
