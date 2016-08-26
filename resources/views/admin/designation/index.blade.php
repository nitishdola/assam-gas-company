@extends('layouts.admin')
@section('title') All Racks @stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
		    @include('admin.designation._index')
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Racks Found !
                </div>

                <a href="{{ route('rack.create') }}" class="btn btn-success">Add new designation Added</a>
		    @endif
		</div>
	</div>
</div>
@endsection