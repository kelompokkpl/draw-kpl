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
<script src="{{asset('assets/js/draw-shortcut.js')}}"></script>