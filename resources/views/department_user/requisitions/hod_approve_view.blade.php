@extends('layouts.department_user')
@section('title') Approve Requisition (HOD)@stop
@section('pageTitle') Approve Requisition (HOD)@stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>
<li>
	<i class="fa fa-th"></i>
	Approve Requisitions
</li>
@stop

@section('content')



<div class="col-lg-12" style="margin-top:20px;">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
			<?php $count = 1; ?>
			<table class="table table-striped table-bordered table-advance table-hover">
			    <thead>
			        <tr>
			            <th>#</th>
			            <th class="hidden-xs">Department</th>
			            <th> Requisition Number </th>
			            <th> Job Number </th>
			            <th> Nature of Work </th>
			            <th> Raised by </th>
			            <th> Requisition Raise Date </th>
			            <th> View Requisition Items </th>
			            <th> Actions </th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr @if(!$v->status) class="danger" @endif>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->department['name'] }} </td>
			            <td> {{ $v->requisition_number }} </td>
			            <td class="hidden-xs"> {{ $v->job_number }} </td>
			            <td> {{ $v->nature_of_work }} </td>
			            <td> {{ $v->department_user['name'] }} </td>
			            <td> {{ date('d-m-Y h:i A', strtotime($v->created_at)) }} </td>
			            <td> <button class="btn btn-info btn-sm" onclick="showItems({{ $v->id }})"><i class="fa fa-search" aria-hidden="true"></i>
 View Requisition Items</button>
			            <td> 
                        @if($v->hod == NULL)
			            <a href="" class="btn btn-success"> Approve <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
			            @elseif( $v->hod != NULL && $v->hod_approve_date != NULL )
			            <a href="" class="btn btn-success disabled"> Approved </a>
			            @endif
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">New message</h4>
        </div>
        <div class="modal-body">
          
          <table class="table">
          	<thead>
          		<tr>
	          		<th>#</th>
	          		<th> Item Name </th>
	          		<th> Item Code </th>
	          		<th> Quantity Demanded </th>
	          		<th> Quantity in Stock </th>
	          		<th> Remarks </th>
	          	</tr>
          	</thead>

          	<tbody id="itemList">
          		
          	</tbody>
          </table>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
</div>
@endsection

@section('pageJs')
<script>
function showItems(id) {
	$.blockUI();
	var url = '';
	var data = '';
	var html = '';
	var indx = 1;
	data += '&requisition_id='+id;
	url  += "{{ route('rest.view_requisition_items') }}";
	$.ajax({
		url  : url,
		data : data,

		error : function(resp) {
			console.log(resp);
		},

		success : function(resp) {
			$.unblockUI();
	
			$('#itemList').empty();
			jQuery.each( resp, function( i, val ) {
			  	html += '<tr>';
			  	html += '<td>'+indx+'</td>';
			  	html += '<td>'+val.item_measurement.item_name+'</td>';
			  	html += '<td>'+val.item_measurement.item_code+'</td>';
			  	html += '<td>'+val.quantity_demanded+'</td>';
			  	html += '<td>'+val.item_measurement.stock_in_hand+'</td>';
			  	html += '<td>'+val.remarks+'</td>';
			  	html += '</tr>';
			  	indx++;
			});

			$('#itemList').html(html);
			$('#exampleModal').modal('show');
		}
	});
}
</script>
@stop