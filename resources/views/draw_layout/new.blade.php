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

<div id="loading">
  <img id="loading-image" class="mx-auto" src="{{asset('assets/image/loader1.gif')}}" alt="Loading..." />
</div>

<!-- Main Content -->
	<div class="main-content" id="animate">
		<!-- Main -->
		<div class="main text-center font-weight-bold">
			<div class="main-head">
				<h2 class="bold mb-0">New Draw</h2>
				<hr class="line-title col-md-3 mt-2"></hr>
				Scroll and choose one category and click Draw!
			</div>

			<div class="main-body text-center">
				<div class="wrap-container" id="wrap-scroll">
				    <ul id="ul-scroll" class="ul-scroll">
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
<script>
  $(document).ready( function() {
  	setTimeout(function(){
  		$("#loading").fadeOut("slow");
  	}, 500);
  });
</script>
<script type="text/javascript">
	var url = {!! json_encode(URL::to('/eo/dashboard_event/recent')) !!};
</script>
<script src="{{asset('assets/js/draw.js')}}"></script> 