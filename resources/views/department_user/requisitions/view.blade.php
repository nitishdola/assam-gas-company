@extends('layouts.department_user')

@section('title') Material Requisition Details @stop
@section('pageTitle') Material Requisition Details @stop

@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('requisition.index') }}"> View All Requisitions</a>
</li>

<li>
	Material Requisition Details
</li>
@stop

@section('content')
<div class="widget-container fluid-height clearfix">
	<div class="widget-content padded">
		<div class="col-md-12">
			@include('department_user.requisitions._view_requisition_details')
		</div>
	</div>
</div>

@stop


@section('pageJs')
<script>
function receiveItem(id) {
	if(confirm('Are you sure you want to receive ? This action can not be undone.')) {
		$.blockUI();
		var data = '';
		var url  = '';

		data += '&requisition_item_id='+id;
		url  += "{{ route('rest.user_receive_item') }}";
		$.ajax({
			data : data,
			url  : url,

			error : function(resp) {
				$.unblockUI();
				alert('Something went wrong !');
				console.log(resp);
			},

			success : function(resp) {
				$.unblockUI();
				alert(resp);
				location.reload();
			}
		});
	}
}
</script>
@stop