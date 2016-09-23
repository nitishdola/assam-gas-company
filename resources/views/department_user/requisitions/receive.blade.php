@extends('layouts.department_user')
@section('content')
@section('pageCss')
<style>
span.step {
  background: #6B6D72;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 5px;
  text-align: center;
  width: 1.6em; 
  font-size: 2.3em;
}
.item-list {
  background: #f8f8f8;
}
</style>
@stop
@section('pageTitle') View Requisition Details @stop
<style>
  .item-field{
    padding: 6px 0;
    background: #f6f6f6; 
    margin-bottom: 4px;
  }
  h5 {
    text-align: center;
    padding: 15px 0;
    text-decoration: underline;
  }
  hr.style13 {
    height: 5px;
    border: 0;
    box-shadow: 0 10px 10px -10px #8c8b8b inset;
  }
</style>

<div class="box box-primary">
  <div class="box-body item-view">
    <h3>Requisitions Details</h3>
    <hr class="style13">
    <div class="row">
      <div class="col-md-6">

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Department</b> </div>
          <div class="col-md-6"> {{$info->department['name']}}</div>
        </div>

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
        
      </div>

      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>Nature of Work</b> </div>
          <div class="col-md-6">{{$info->nature_of_work}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Chargeable Account</b> </div>
          <div class="col-md-6 no-padding">{{$info->chargeable_account['name']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Financial Year </b></div>
          <div class="col-md-6 no-padding">{{$info->financial_year}} </div>
        </div>
      </div>

      <div class="col-md-4 col-md-offset-4">
          <a href="{{ route('purchase_indent.create', Crypt::encrypt($info->id)) }}" class="btn btn-info"><i class="fa fa-paper-plane" aria-hidden="true"></i>MAKE MATERIAL PURCHASE INDENT</a>
      </div>
    </div>
  </div>

  <div class="box-body item-view">
    <h3>Material(s) Details</h3>
    @foreach($requisition_items as $k => $v)
    <hr class="style13">
    <div class="row item-list">
      <div class="col-md-1"><span class="step"> {{ $k+1 }}</span></div>
      <div class="col-md-6">
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
          <div class="col-md-6"> {{$v->item_measurement['item_name']}}</div>
        </div>
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9"> 
          	
			<div class="col-md-12">
				<h4>Stock in Hand : <strong>{{$v->item_measurement['stock_in_hand']}}</strong> </h4>
				<a class="btn btn-success" href=" {{ route('requisition.issue.view', [Crypt::encrypt($info->id), Crypt::encrypt($v->id)]) }}"> <i class="fa fa-check-square-o" aria-hidden="true"></i> ISSUE ITEM </a>
				<!-- <a class="btn btn-info"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> CREATE NIT </a> -->
				<a class="btn btn-danger"> <i class="fa fa-arrows-alt" aria-hidden="true"></i> REJECT </a>
			</div>	
        </div>
      </div>

      <div class="col-md-5">
        <div class="col-md-12 item-field">
            <div class="col-md-6 no-padding"><i class="fa fa-gg"></i>
              <b> Measurement Unit</b> 
            </div>
            <div class="col-md-6 no-padding"> {{$v->measurement_unit['name']}} </div>
        </div>
        <div class="col-md-12 item-field">
            <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Rate</b> </div>
            <div class="col-md-6 no-padding"> {{$v->rate}} </div>
        </div>
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Remarks </b></div>
            <div class="col-md-6 no-padding">@if($v->remarks != '') {{$v->remarks}} @else -- @endif</div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
 
@stop
