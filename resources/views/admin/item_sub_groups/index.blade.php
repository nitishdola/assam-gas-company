@extends('layouts.admin')
@section('title') All Item Sub Groups @stop
@section('pageTitle') All Item Sub Groups @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
		    @include('admin.item_sub_groups._index')
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Sections Found !
                </div>

                <a href="{{ route('item_sub_group.create') }}" class="btn btn-success">Add new item sub group</a>
		    @endif
		</div>
	</div>
</div>
@endsection