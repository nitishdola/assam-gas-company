@extends('layouts.department_user')
@section('title') Material Requisition Status for requition number {{$requisition_number}} @stop
@section('pageTitle') Material Requisition Status for requition number {{$requisition_number}}@stop
@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('requisition.index') }}">All Material Requisitions</a>
</li>

<li>
	Material Requisition Status
</li>
@stop
@section('content')
<div class="widget-container fluid-height clearfix">
	<div class="widget-content padded">
	    <div class="col-xs-12">
        <div class="alert alert-success">
          <strong>Success!</strong> Requisition number {{$requisition_number}} successfully approved.
        </div>
		  </div>
	</div>
</div>

@endsection
