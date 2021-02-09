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
		.main2{ background-image: url("{{asset('assets/uploads/background'.'/'.$event->background_new_draw)}}"); }
	@endif
</style>

	<!-- Main Content -->
	<div class="main-content" id="root">
		<!-- Main -->
		<div class="main2 text-center font-weight-bold">
			<div class="main-head text-left col-md-5">
				<small>Choose draw category</small><br>
				<form action="" method="POST">
					<select name="category_id" class="draw-select" v-model="selected_category" @change="getWinners">
						<option value="">Please select a category</option>
						@foreach($category as $row)
							<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach
					</select>
				</form>
			</div>

			<div class="row text-lato text-center">
				<div v-if="!winners.length" class="text-center mx-auto"><h3>No Data Available</h3></div>
				<div class="col-md-3 mb-4 mx-auto" v-for="winner in winners">
					@{{winner.name}}<br>
					<span class="text-lato-thin">@{{winner.participant_id}}</span>
				</div>
			</div>
		</div>		
	</div>

<script type="text/javascript">
	var basepath = {!! json_encode(URL::to('/eo/dashboard_event')) !!};
</script>

<script src="{{ asset ('assets/js/draw_winners.js')}}"></script>
