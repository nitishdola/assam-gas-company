@extends('layouts.admin')
@section('title') All Account Users @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Accounts Users |<a class="btn btn-info" href="{{ route('account_users.download') }}"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
</li>

@stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			{!! Form::open(array('route' => 'role.index', 'id' => 'role.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			@include('admin.role._search_form')
			{!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		    {!! Form:: submit('Search', ['class' => 'btn btn-success']) !!}

			{!!form::close()!!}
		</div>
	</div>
</div>

<div class="col-lg-12" style="margin-top:20px;">

	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
			<?php $count = 1; ?>
			<table class="table table-striped table-bordered table-advance table-hover">
			    <thead>
			        <tr>
			            <th>
			                #
			            </th>
			            <th class="hidden-xs">
			                 Name
			            </th>
			            <th>
			                Description
			            </th>
			             <th>Edit</th>
                        <th>Remove</th>

			          
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			           
			            <td> {{ $v->name }} </td>
			            <td> {{ $v->description }} </td>
			             <td> <a href="{{ route('role.edit', Crypt::encrypt($v->id) ) }}" title="Edit Role"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </td>
            <td> <a onclick="return confirm('Are you sure you want to delete this Role ?');" href="{{ route('role.disable', Crypt::encrypt($v->id) ) }}" title="Remove Role"><i class="fa fa-trash-o fa-fw"></i>Remove</a> </td>
			           
			        </tr>
			        @endforeach
			    </tbody>
			</table>
			<div class="pagination">
			{!! $results->render() !!}
			</div>
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Rols Found !
                </div>
		    @endif
		</div>
	</div>
</div>
@endsection