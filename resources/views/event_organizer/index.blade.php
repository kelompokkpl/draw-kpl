@extends('event_organizer_template.eo_template')

@push('head')
 <link href="{{ asset("assets/css/highchart.css")}}" rel="stylesheet" type="text/css" />
@endpush

@section('content-header')
        <section class="content-header">
            <h1> <i class='fa fa-dashboard'></i> Dashboard </h1>
        </section>
@endsection

@section('content')
<!-- Total -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Event</span>
              <span class="info-box-number">{{$event}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Upcoming Event</span>
              <span class="info-box-number">{{$upcoming}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Past Event</span>
              <span class="info-box-number">{{$past}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<!-- Chart -->
    <!-- Payment Chart -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Payment Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="chart">
                    <!-- Payment Chart Canvas -->
                    <figure class="highcharts-figure">
                      <div id="container-pie"></div>
                      <p class="highcharts-description">
                        <!-- desk -->
                      </p>
                    </figure>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>

      <!-- end of payment chart -->

      <!-- Activity Chart -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Activity Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="chart">
                    <!-- Activity Chart Canvas -->
                    <figure class="highcharts-figure">
                      <div id="container"></div>
                      <p class="highcharts-description">
                        
                      </p>
                    </figure>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          </div>
    <!-- end of activity chart -->

@endsection

@push('bottom')
<script type="text/javascript">
  let payment = {!! json_encode($payment) !!}
</script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="{{ asset ('assets/js/dashboard-eo.js')}}"></script>
@endpush