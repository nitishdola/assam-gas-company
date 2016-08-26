@extends('layouts.admin')
@section('title') All Account Users @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Accounts Users
</li>

@stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			{!! Form::open(array('route' => 'account_user.index', 'id' => 'account_user.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			@include('admin.users.account._search_form')
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
			                Employee Name
			            </th>
			            <th>
			                Username
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
			            <td> {{ $v->username }} </td>
			             <td> <a href="{{ route('account_user.edit', Crypt::encrypt($v->id) ) }}" title="Edit Location">Edit</a>
            </td>
            <td> <a onclick="return confirm('Are you sure you want to delete this Department ?');" href="{{ route('account_user.disable', Crypt::encrypt($v->id) ) }}" title="Remove Department"><i class="fa fa-trash"></i>Remove</a> </td>
			           
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
                  No Users Found !
                </div>
		    @endif
		</div>
	</div>
</div>
@endsection