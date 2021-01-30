<!-- First you need to extend the CB layout -->
@extends('event_organizer_template.eo_template')

@section('content-header')

        <section class="content-header">
            <h1> <i class='fa fa-bars'></i> Payment &nbsp;&nbsp;

              <a href="{{URL::to('eo/payment')}}" id='btn_show_data' class="btn btn-sm btn-primary" title="Show Data Payment">
                  <i class="fa fa-table"></i> Show Data
              </a>

              <a href="{{URL::to('eo/payment/create')}}" id='btn_show_data' class="btn btn-sm btn-success" title="Add Data Payment">
                  <i class="fa fa-plus-circle"></i> Add Data
              </a>

            </h1>

            <ol class="breadcrumb">
                <li><a href="{{URL::to('eo')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Payment</li>
            </ol>
        </section>
@endsection

@section('content')
<!-- Your custom  HTML goes here -->
<div class='panel panel-default' id="root">
    <div class="panel-body">
      <table class='table table-striped table-bordered datatables-simple'>
        <thead>
            <tr>
              <th>Event Name</th>
              <th>Payment Status</th>
              <th class="text-right">Action</th>
             </tr>
        </thead>
        <tbody>
          @foreach($event as $row)
            <tr>
              <td>{{$row->name}}</td>
              <td>
                  <span class="label label-{{($row->payment_status=='Paid')?'success':'danger'}}">
                    {{$row->payment_status}}
                  </span>
              </td>
              <td class="text-right">
                <a class='btn btn-xs btn-success' title='Upload' data-toggle="modal" data-target="#paymentCreate{{$row->id}}">
                  <i class='fa fa-upload'></i> Upload 
                </a>

                <a class='btn btn-xs btn-primary btn-detail' title='Detail Data' href='{{ route('event.show', $row->id) }}'>
                  <i class='fa fa-eye'></i> Detail
                </a>
              </td>

              <!-- Modal Payment Create -->
                <div class="modal fade" id="paymentCreate{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="paymentTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title">Create Payment</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{route('payment.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                          <div class='form-group header-group-0 ' id='form-group-name' style="">
                            <label class='control-label col-sm-2'> Name
                                <span class='text-danger' title='This field is required'>*</span>
                            </label>
                            <div class="col-sm-10">
                              <input type='text' title="Name" required placeholder='You can only enter the letter only'  maxlength=100 class='form-control' name="name" id="name" value=''/>
                              <div class="text-danger"></div>
                              <p class='help-block'></p>
                            </div>
                          </div>    

                          <div class='form-group header-group-0 ' style="">
                            <label class='control-label col-sm-2'>Nominal
                              <span class='text-danger' title='This field is required'>*</span>
                            </label>
                            <div class="col-sm-10">
                              <input type='number' title="Nominal" required class='form-control' placeholder='You can only enter the number only' name="nominal"/>
                              <div class="text-danger"></div>
                              <p class='help-block'></p>
                            </div>
                          </div>

                          <div class='form-group header-group-0 ' style="">
                            <label class='control-label col-sm-2'>Transfer Date
                              <span class='text-danger' title='This field is required'>*</span>
                            </label>
                            <div class="col-sm-10">
                              <input type='date' title="Transfer Date" required class='form-control' name="transfer_date" value="{{date('Y-m-d')}}" />
                              <div class="text-danger"></div>
                              <p class='help-block'></p>
                            </div>
                          </div>

                          <div class='form-group header-group-0 ' style="">
                            <label class='control-label col-sm-2'>Photo
                              <span class='text-danger' title='This field is required'>*</span>
                            </label>
                            <div class="col-sm-10">
                              <input type='file' title="Photo" required class='form-control' name="photo" accept="image/*" />
                              <div class="text-danger"></div>
                              <p class='help-block'></p>
                            </div>
                          </div>
                          <input type="hidden" name="event_id" value="{{$row->id}}">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection