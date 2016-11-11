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

	.red-me {
		background: #CD1919;
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
			{!! Form::open(array('route' => 'requisition.view_all.pending_requisitions', 'id' => 'requisition.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			<div class="col-md-4"> 
				<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
				    {!! Form::label('department_id', 'Department', array('class' => 'col-md-3 control-label')) !!}
				    <div class="col-md-9">
				      {!! Form::select('department_id', $departments, $department_id, ['class' => 'select2 form-control', 'id' => 'department_id', 'placeholder' => 'Select Department', 'autocomplete' => 'off']) !!}
				    </div>
				    {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-4"> 
				<div class="form-group {{ $errors->has('job_number') ? 'has-error' : ''}}">
				    {!! Form::label('job_number', '', array('class' => 'col-md-4 control-label')) !!}
				    <div class="col-md-8">
				      {!! Form::text('job_number', $job_number, ['class' => 'form-control', 'id' => 'job_number', 'placeholder' => 'Job Number', 'autocomplete' => 'off']) !!}
				    </div>
				    {!! $errors->first('job_number', '<span class="help-inline">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-4"> 
				<div class="form-group {{ $errors->has('requisition_number') ? 'has-error' : ''}}">
				    {!! Form::label('requisition_number', '', array('class' => 'col-md-4 control-label')) !!}
				    <div class="col-md-8">
				      {!! Form::text('requisition_number', $requisition_number, ['class' => 'form-control', 'id' => 'requisition_number', 'placeholder' => 'Requisition Number', 'autocomplete' => 'off']) !!}
				    </div>
				    {!! $errors->first('requisition_number', '<span class="help-inline">:message</span>') !!}
				</div>
			</div>

			<div class="col-md-12"> 
				{!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			    {!! Form:: submit('Search', ['class' => 'btn btn-warning']) !!}
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

			{!! Form::open(array('route' => 'requisition.approve_multiple', 'id' => 'requisition.approve_multiple', 'class' => 'form-horizontal row-border')) !!}

			<table id="datatable1" class="table table-striped table-bordered table-advance table-hover">
			    <thead>
			        <tr>
			        	<th rowspan="2" class="col-md-1"><input type="checkbox" name="check[]" id="select_all" value="1"> Select All </th>
			            <th rowspan="2">#</th>
			            <th rowspan="2" class="hidden-xs">Department</th>
			            <th rowspan="2"> Requisition Number </th>
			            <th rowspan="2"> Requisition Date </th>
			            <th rowspan="2"> Job Number </th>
			            <th rowspan="2"> Raised by </th>
			            <!-- <th rowspan="2"> Nature of Work </th> -->
			            <th rowspan="2"> Item </th>
			            <th colspan="2" style="text-align: center"> Quantity </th>
			            <th rowspan="2"> Accept/Reject </th>
			        </tr>
			        <tr>
			          <th class="col-md-1"> Demanded </th>
			          <th class="col-md-1"> Available </th>
		          </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr id="row_{{$v->id}}">
			        	<td> <input type="checkbox" class="checkbox" name="ids[]" value="{{ $v->id }} ">
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->department }} ( {{ $v->requisition_date }} )</td>
			            <td> {{ $v->requisition_number }} </td>
			            <td> {{ date('d-m-Y h:i A', strtotime($v->requisition_date)) }} </td>
			            <td> {{ $v->job_number }} </td>
			            <td class="hidden-xs"> {{ $v->raised_by }} </td>
			            <td> {{ $v->item_name }} ( <b>{{ $v->item_code }} </b>)</td>
			            <td> {{ $v->quantity_demanded }} </td>
			            <td> <b> <span class="@if($v->quantity_demanded >= $v->stock_in_hand) warning @else success @endif"> {{ $v->stock_in_hand }} </span> </b> </td>
			            
			            <td> 
			            	<a href="javascript:void(0);" title="Authorize for Issue" class="btn btn-success btn-xs" onclick="authorizeItem({{$v->id}})"> Authorize</a>
			            	<a href="javascript:void(0);" title="Item cannot be issued" class="btn btn-danger btn-xs" onclick="rejectItem({{$v->id}})">Reject</a>
						</td>


			        </tr>
			        @endforeach
			    </tbody>
			</table>
			<div class="pagination">
			{!! $results->render() !!}
			</div>

				<div class="col-md-2 col-md-offset-5" style="margin-top:10px;"> 
					{!! Form:: submit('Authorize All Selected', ['class' => 'btn btn-success', 'id' => 'authorize_all', 'disabled' => true]) !!}
				</div>
			</div>

			{!! Form::close() !!}
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
	//"sPaginationType": "bs_full",
	"paging": false,
	'pageLength' : false
});

//Select All
$("#select_all").change(function(){  //"select all" change
    $(".checkbox").prop('checked', $(this).prop("checked")); 
    //change all ".checkbox" checked status
    $('#authorize_all').prop('disabled', false);	 
});

//".checkbox" change
$('.checkbox').change(function(){
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(false == $(this).prop("checked")){ //if this item is unchecked
        $("#select_all").prop('checked', false); 
        //change "select all" checked status to false

    }
    
    //check "select all" if all checkbox items are checked
    if ($('.checkbox:checked').length == $('.checkbox').length ) {
        $("#select_all").prop('checked', true);
    }

    if( $('.checkbox:checked').length != 0) {
		$('#authorize_all').prop('disabled', false);
	}else{
		$('#authorize_all').prop('disabled', true);
	}
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
		type : 'get',

		error : function(resp) {
			console.log(resp);
			$.unblockUI();
		},
		success : function(resp) {
			$.unblockUI();
			//console.log(resp);
			alert(resp);
			$('#row_'+id).slideUp(500);
		}
	});
}

function rejectItem(id) {
	$.blockUI();
	//authorize
	var url = '';
	var data = '';
	data += '&item_id='+id;
	url  += '{{ route("rest.reject_requisition_item") }}';

	$.ajax({
		url  : url,
		data : data,
		type : 'get',

		error : function(resp) {
			console.log(resp);
			$.unblockUI();
		},
		success : function(resp) {
			$.unblockUI();
			//console.log(resp);
			alert(resp);
			$('#row_'+id).slideUp(500);
		}
	});
}
</script>
@stop