@extends('layouts.material_user')
@section('title') All Items @stop
@section('pageTitle') All Items @stop
@section('pageCss') <style>
	.success {
		color:#4BB521;
		font-weight: 500;
	}
	.modal-backdrop {
	   background-color: #FFF;
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
			{!! Form::open(array('route' => 'requisition.view_hod_approved_item_list', 'id' => 'requisition.view_hod_approved_item_list', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
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
			<table id="datatable1" class="table table-striped table-bordered table-advance table-hover">
			    <thead>
			        <tr>
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
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->department }} ( {{ $v->department_code }} )</td>
			            <td> {{ $v->requisition_number }} </td>
			            <td> {{ date('d-m-Y h:i A', strtotime($v->requisition_date)) }} </td>
			            <td> {{ $v->job_number }} </td>
			            <td class="hidden-xs"> {{ $v->raised_by }} </td>
			            <td> {{ $v->item_name }} ( <b>{{ $v->item_code }} </b>)</td>
			            <td id="demanded_{{$v->id}}"> {{ $v->quantity_demanded }} </td>
			            <td> <b> <span class="@if($v->quantity_demanded >= $v->stock_in_hand) warning @else success @endif"> {{ $v->stock_in_hand }} </span> </b> </td>
			            <td> 
			            	<a href="javascript:void(0);" title="Authorize for Issue" class="btn btn-success btn-xs" onclick="issueItem({{$v->id}})"> ISSUE</a>
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

<div class="bd-example">
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Issue Item <span id="itemName"></span></h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="demanded" class="form-control-label">Demanded:</label>
              <input type="text" class="form-control" id="demanded">
            </div>
            <div class="form-group">
              <label for="issued" class="form-control-label">Issued:</label>
              <input type="issued" class="form-control" id="issued">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="requisition_item_id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="issue_item" class="btn btn-primary">Issue Item and Notify User Dept.</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('pageJs')

<script>
function issueItem(id) {
	var demanded = $('#demanded_'+id).text();
	$('#demanded').val(demanded);
	$('#issued').val(demanded);
	$('#requisition_item_id').val(id);
	$('.modal').modal('show');	
}

$('#issue_item').click(function(e) {
	e.preventDefault();
	var url = '';
	var data = '';

	data += '&item_id='+$.trim($('#requisition_item_id').val())+'&issued='+$('#issued').val();
	url  += '{{ route("requisition.issue_item") }}';
	console.log(url);
	console.log(data);
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
			console.log(resp);
			alert(resp);
			$('#row_'+$('#requisition_item_id').val()).css("background-color","#68D659");
			$('#row_'+$('#requisition_item_id').val()).slideUp(500);
			$('.modal').modal('hide');	
		}
	});
});
</script>
@stop