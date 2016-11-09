@extends('layouts.material_user')
@section('title') All Items @stop
@section('pageTitle') All Items @stop
@section('pageCss') <style>
	.warning {
		color:#C86902;
		font-weight: 500;
	}

	.success {
		color:#4BB521;
		font-weight: 500;
	}
</style>
@stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>
<li>
	<i class="fa fa-th"></i>
	Requisitions
</li>
@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			{!! Form::open(array('route' => 'requisition.index', 'id' => 'requisition.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			
			<div class="col-md-12"> 
				{!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			    {!! Form:: submit('Search', ['class' => 'btn btn-success']) !!}
			</div>

			{!!form::close()!!}
		</div>
	</div>
</div>

<div class="col-lg-12" style="margin-top:20px;">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
			<?php $count = 1; ?>
			<table id="datatable1" class="table table-striped table-bordered table-advance table-hover">
			    <thead>
			        <tr>
			            <th>#</th>
			            <th class="hidden-xs">Department Name and Code</th>
			            <th> Requisition Number </th>
			            <th> Requisition Date </th>
			            <th> Job Number </th>
			            <th> Raised by </th>
			            <th> Nature of Work </th>
			            <th> Item </th>
			            <th> Quantity Demanded </th>
			            <th> Quantity Available </th>
			            <th> Accept/Reject </th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->requisition['department']['name'] }} ( {{ $v->requisition['department']['department_code'] }} )</td>
			            <td> {{ $v->requisition['requisition_number'] }} </td>
			            <td> {{ date('d-m-Y h:i A', strtotime($v->created_at)) }} </td>
			            <td> {{ $v->requisition['job_number'] }} </td>
			            <td class="hidden-xs"> {{ $v->requisition['department_user']['name'] }} </td>
			            <td> {{ $v->requisition['nature_of_work'] }} </td>
			            <td> {{ $v->item_measurement['item_name'] }} ( <b>{{ $v->item_measurement['item_code'] }} </b>)</td>
			            <td> {{ $v->quantity_demanded }} </td>
			            <td> <b> <span class="@if($v->quantity_demanded >= $v->item_measurement['stock_in_hand']) warning @else success @endif"> {{ $v->item_measurement['stock_in_hand'] }} </span> </b> </td>
			            

			            <td> 
			            	<a href="javascript:void(0);" title="Authorize for Issue" class="btn btn-success" onclick="authorizeItem('{{Crypt::encrypt($v->id)}}')"> Authorize</a>
			            	<a href="#" title="Item cannot be issued" class="btn btn-danger">Reject</a>
						</td>


			        </tr>
			        @endforeach
			    </tbody>
			</table>
			<div class="pagination">
			{!! $results->render() !!}
			</div>
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Items Found !
                </div>
		    @endif
		</div>
	</div>
</div>
@endsection

@section('pageJs')
<script>
$('#datatable1').dataTable({
	"sPaginationType": "bs_full",
	"paging": false
});

function authorizeItem(id) {
	$.blockUI();
	//authorize
	var url = '';
	var data = '';
	data += '&item_id='+id;
	url  += '{{ route("rest.approve_requisition_item") }}';

	$.ajax({
		url  : url,
		data : data,
		type : 'post',

		error : function(resp) {
			console.log(resp);
			$.unblockUI();
		},
		success : function(resp) {
			$.unblockUI();
			console.log(resp);
		}
	});

}
</script>
@stop