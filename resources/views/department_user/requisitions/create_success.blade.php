@extends('layouts.department_user')
@section('title') Requisition Raise Success @stop
@section('pageTitle') Requisition Raise Success @stop

@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-plus"></i>
	<a href="{{ route('requisition.create') }}">Requisition Raise Form</a>
</li>
@stop
@section('content')
<div class="widget-container fluid-height clearfix">
	<div class="widget-content padded">
	    <div class="col-md-6 col-md-offset-3">

	    	<div class="row">
				<div class="col-lg-12">
          			<div class="alert alert-info }}">
              			<button type="button" class="close" data-dismiss="alert">×</button>
              			{{ $message }}
          			</div>
      			</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
				    <a href="{{ route('requisition.create') }}" class="btn btn-success">Create New Requisition</a>

				    <a href="{{ route('department_user.dashboard') }}" class="btn btn-info">Back to Dashboard</a>
				</div>
			</div>
			     
		</div>
	</div>
</div>

@endsection

