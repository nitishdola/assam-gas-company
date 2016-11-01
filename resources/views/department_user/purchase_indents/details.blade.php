@extends('layouts.department_user')
@section('content')
<div class="widget-container fluid-height clearfix">
	<div class="widget-content padded">
		<div class="row">
		    <div class="col-xs-12">
          @include('department_user.purchase_indents._view_details')
        </div>
    </div>
</div>
@stop
