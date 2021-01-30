@extends('draw_template.content')

@section('content')

<!-- Main Content -->
	<div class="main-content">
		<!-- Main -->
		<div class="main text-center font-weight-bold">
			<div class="main-head">
				<h3 class="bold mb-0">New Draw</h3>
				<hr class="line-title col-md-3 mt-0"></hr>
				Scroll and choose one category and click Draw!
			</div>

			<div class="main-body text-center">
				<!-- Border of item -->
				<div class="draw-border col-md-6">
					<img src="assets/image/img_border.png" class="img-fluid">
				</div>
				<!-- <img src="assets/image/img_border.png" class="draw-border"> -->
				<div class="wrap-container" id="wrap-scroll">
				    <ul id="ul-scroll">
				    	<li class="active"> <span class="item"> Item one </span> </li>
				    	<li> <span class="item"> Item two </span> </li>
				    	<li> <span class="item"> Item three </span> </li>
				    	<li> <span class="item"> Item four </span> </li>
				    	<li> <span class="item"> Item five </span> </li>
				    	<li> <span class="item"> Item six </span> </li>
				    	<li> <span class="item"> Item seven </span> </li>
				    	<li> <span class="item"> Item eight </span> </li>
				    	<li> <span class="item"> Item nine </span> </li>
				    	<li> <span class="item"> Item ten </span> </li>
				    	<li> <span class="item"> Item eleven </span> </li>
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
				<a href="index2.html"><button class="draw-btn draw-btn-lg">Draw</button></a>
			</div>
		</div>
		<!-- End of Main -->
	</div>
<!-- End of Main Content -->

@endsection