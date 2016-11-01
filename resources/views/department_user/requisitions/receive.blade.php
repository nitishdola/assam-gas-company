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
<div class="widget-container fluid-height clearfix">
	<div class="widget-content padded">
    <div class="col-xs-12">
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

        <hr class="style13">
        <div class="box-body item-view">
          <h4>Items Required</h4>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Item</th>
                <th>Measurement Unit</th>
                <th>Stock in Hand</th>
                <th>Description</th>
                <th>Quantity Demanded</th>
                <th>Previous Rate</th>
                <th>Remarks</th>
              </tr>
            </thead>

            <tbody>
              @foreach($requisition_items as $k => $v)
              <tr>
                <td>{{ $k+1 }}</td>
                <td>{{$v->item_measurement['item_name']}}</td>
                <td>{{$v->item_measurement['measurement_unit']->name}}</td>
                <td>{{$v->item_measurement['stock_in_hand']}}</td>
                <td>{{$v->store_description}}</td>
                <td>{{$v->quantity_demanded}}</td>
                <td>{{$v->rate}}</td>
                <td>{{$v->remarks}}</td>
                <td><a class="btn btn-success" href=" {{ route('requisition.issue.view', [Crypt::encrypt($info->id), Crypt::encrypt($v->id)]) }}"> <i class="fa fa-check-square-o" aria-hidden="true"></i> ISSUE ITEM </a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
