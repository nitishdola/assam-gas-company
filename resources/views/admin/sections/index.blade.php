@extends('layouts.admin')
@section('title') All Sections @stop
@section('pageTitle') All Sections @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Sections |<a class="btn btn-info" href="{{ route('section.download') }}"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
		    @include('admin.sections._index')
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Sections Found !
                </div>

                <a href="{{ route('section.create') }}" class="btn btn-success">Add new Section</a>
		    @endif
		</div>
	</div>
</div>
@endsection