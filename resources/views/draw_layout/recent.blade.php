<style type="text/css">
	@if($event->background_recent_draw!='')
		.main{ background-image: url("{{asset('assets/uploads/background'.'/'.$event->background_recent_draw)}}"); }
	@endif
</style>
<div id="loading">
  <img id="loading-image" src="{{asset('assets/image/loader1.gif')}}" alt="Loading..." />
</div>
	<!-- Main Content -->
	<div class="main-content" id="animate">
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
	var drawing_url = {!! json_encode(URL::to('/eo/dashboard_event/drawing')) !!};
</script>

<script src="{{asset('assets/js/draw-shortcut.js')}}"></script>
<script>
  $(document).ready( function() {
  	setTimeout(function(){
  		 $("#loading").fadeOut("slow");
  	}, 500);
  });
</script>