
@extends('layouts.department_user')

@section('pageTitle') View Requisition Details @stop
<style>
  .item-field{padding: 6px 0;background: #f6f6f6;margin-bottom: 4px;}
  h4 {text-align: center;padding: 15px 0;text-decoration: underline;}

 
</style>

@section('content')
<div class="row">
  <div class="col-md-12">

  <button type="button" class="btn btn-info"><a href="{{ route('requisition.edit', Crypt::encrypt($info->id) ) }}">Edit</a></button>
<button type="button" class="btn btn-info"><a href="{{ route('requisition.index', Crypt::encrypt($info->id) ) }}">Back</a></button>
    <div class="box box-primary">
        <div class="box-body item-view">
          <h4><b>Requisitions Details</b> </h4>


              <div class="row">
              <div class="col-md-6" style="padding-left:5px; padding-right:0px;">
                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Requisition Number</b> </div>
                  <div class="col-md-6"> {{$info->requisition_number}}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Department</b> </div>
                  <div class="col-md-6"> {{$info->department['name']}}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> <b>Job Number </b></div>
                  <div class="col-md-6">{{$info->job_number}} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b>Nature of Work</b> </div>
                  <div class="col-md-6">{{$info->nature_of_work}} </div>
                </div>

              
              
              </div>

              <div class="col-md-6" style="padding-left:5px; padding-right:5px;">
                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Chargeable Account</b> </div>
                  <div class="col-md-6 no-padding">{{$info->chargeable_account['name']}} </div>
              </div>

              <div class="col-md-12 item-field">
                <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Financial Year </b></div>
                  <div class="col-md-6 no-padding">{{$info->financial_year}} </div>
                </div>
              </div>
               
              <div class="col-md-10 col-md-offset-1">
               
               </div>
            <hr>
          </div>

	</div>

                     <div class="box-body item-view">
          <h4><b>Material(s) Details</b> </h4>
          @foreach($requisition_items as $v)
        <div class="row">
            <div class="col-md-6" style="padding-left:5px; padding-right:0px;">
                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Store Description</b> </div>
                  <div class="col-md-6"> {{$v->store_description}}</div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Quantity Demanded</b> </div>
                  <div class="col-md-6"> {{$v->quantity_demanded}}</div>
                </div>
                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Item Measurement</b> </div>
                  <div class="col-md-6"> {{$v->measurement_item['item_name']}}</div>
                </div>
             </div>

              <div class="col-md-6" style="padding-left:5px; padding-right:5px;">
              <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Measurement Unit</b> </div>
                  <div class="col-md-6 no-padding">{{$v->measurement_unit['name']}} </div>
              </div>
                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Rate</b> </div>
                  <div class="col-md-6 no-padding">{{$v->rate}} </div>
              </div>

              <div class="col-md-12 item-field">
                <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Remarks </b></div>
                  <div class="col-md-6 no-padding">{{$v->remarks}} </div>
                </div>
              </div>
               
              <div class="col-md-10 col-md-offset-1">
               
              </div>
            <hr>
        </div>
        @endforeach
</div>
@stop