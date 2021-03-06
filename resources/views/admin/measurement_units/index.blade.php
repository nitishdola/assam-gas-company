@extends('layouts.admin')
@section('title') All Measurement Unit @stop
@section('pageTitle') All Measurement Unit @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
		    @include('admin.measurement_units._index')
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No measurement units Found !
                </div>

                <a href="{{ route('measurement_unit.create') }}" class="btn btn-success">Add new measurement Unit</a>
		    @endif
		</div>
	</div>
</div>
@endsection