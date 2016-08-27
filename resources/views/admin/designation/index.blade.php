@extends('layouts.admin')
@section('title') All Departments @stop
@section('pageTitle') All Designation @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Designation
</li>

@stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
		    @include('admin.designation._index')
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Designations Found !
                </div>

                <a href="{{ route('rack.create') }}" class="btn btn-success"> New Designation Added</a>
		    @endif
		</div>
	</div>
</div>
@endsection