@extends('layouts.department_user')
@section('pageTitle') Dashboard @stop
@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>
@stop

@section('content')
<div class="row">
	<!-- COLUMN 1 -->
	<div class="col-md-12">
		<div class="row">

		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left red">
						<i class="fa fa-tasks fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number"> <a href="{{ route('item_measurement.index')}}">{{$total_item_measurement}}</a></div>
						<div class="title">Total Item</div>
				   </div>
				</div>
			 </div>
		  </div>

		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left blue">
						<i class="fa fa-gears fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number"><a href="{{ route('salvage_item_measurement.index')}}">{{$total_salvage_measurement}}</a></div>
						<div class="title">Total Salvage Item</div>
				   </div>
				</div>
			 </div>
		  </div>

		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left blue">
						<i class="fa fa-legal fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number"><a href="{{ route('requisition.index')}}">{{$total_requisition}}</a></div>
						<div class="title">Total Requisition</div>
				   </div>
				</div>
			 </div>
		  </div>

		</div>


		<div class="row">
			<div class="col-lg-12">
				<div class="dashbox panel panel-default">
					<div class="panel-body">
					   	<div class="panel-left red">
							<i class="fa fa-chevron-circle-right fa-3x"></i>
					   	</div>

					   	<div class="panel-right">
						        <div class="form-group {{ $errors->has('requisition_id') ? 'has-error' : ''}}">
								  	{!! Form::label('View Requisition Status', '', array('class' => 'col-md-3 control-label')) !!}
									<div class="col-md-5">
										{!! Form::select('requisition_id', $requisitions, null, ['class' => 'select2 col-md-12 required', 'required' => true, 'id' => 'requisition_id', 'autocomplete' => 'off', 'required' => 'true']) !!}
									</div>
								  	<div class="col-md-3">
							        	{!! Form:: button('Search', ['class' => 'btn btn-success', 'id' => 'search']) !!}
							        </div>
								</div>
					   	</div>
					</div>
				</div>
			</div>
		</div>
	<!-- /COLUMN 1 -->
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
	 	<h4 class="danger-min"> Items under Minimum Stock Level</h4>

		@if(count($min_stocked_items))
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Item Name</th>
								<th>Stock in Hand</th>
								<th>Min. stock level</th>
								<th>Reorder Stock Level</th>
							</tr>
						</thead>

						<tbody>
							@foreach($min_stocked_items as $k => $v)
							<tr>
								<td> {{ $k+1 }} </td>
								<td> {{ $v->item_name}} </td>
								<td> {{ $v->stock_in_hand }} </td>
								<td> {{ $v->minimum_stock_level }} </td>
								<td> {{ $v->reorder_stock_level }} </td>
							</tr>
							@endforeach
					</tbody>
				</table>
		@else
		<div class="alert alert-info">
			<strong>No items are under minimum stock level !</strong>
		</div>
		@endif
		</ul>
	</div>

	<div class="col-lg-6">
	 	<h4 class="warning-min"> Items under Minimum Reorder Level</h4>

		@if(count($min_reordered_items))
				<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Item Name</th>
								<th>Stock in Hand</th>
								<th>Min. stock level</th>
								<th>Reorder Stock Level</th>
							</tr>
						</thead>

						<tbody>
							@foreach($min_reordered_items as $k => $v)
							<tr>
								<td> {{ $k+1 }} </td>
								<td> {{ $v->item_name}} </td>
								<td> {{ $v->stock_in_hand }} </td>
								<td> {{ $v->minimum_stock_level }} </td>
								<td> {{ $v->reorder_stock_level }} </td>
							</tr>
							@endforeach
					</tbody>
				</table>
		@else
		<div class="alert alert-info">
			<strong>No items are under minimum reorder level !</strong>
		</div>
		@endif
		</ul>
	</div>
</div>
@endsection

@section('pageJs')
<script>
$('#search').click(function(e) {
	e.preventDefault();
	var requisition_id = $('#requisition_id').val();
	if(requisition_id != '') {
		window.location = "{{ URL::to('/')}}"+"/requisition/user-department/view-details/"+requisition_id;
	}
});
</script>
@stop
