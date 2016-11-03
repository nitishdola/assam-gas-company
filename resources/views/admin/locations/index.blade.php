@extends('layouts.admin')
@section('title') All Locations @stop
@section('pageTitle') All Locations |<a class="btn btn-info" href="{{ route('location.download') }}"><i class="fa fa-download" aria-hidden="true"></i> Download</a>@stop
@section('content')|
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
		    @include('admin.locations._index')
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Locations Found !
                </div>

                <a href="{{ route('location.create') }}" class="btn btn-success">Add new Location</a>
		    @endif
		</div>
	</div>
</div>
@endsection