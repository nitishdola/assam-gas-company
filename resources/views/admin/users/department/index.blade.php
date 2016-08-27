@extends('layouts.admin')
@section('title') All Department Users @stop
@section('pageTitle') All Department Users @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Department Users
</li>

@stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			{!! Form::open(array('route' => 'department_user.index', 'id' => 'department_user.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			@include('admin.users.department._search_form')
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
			                Department
			            </th>
			            <th>
			                Section
			            </th>

			            <th> Name </th>
			            <th> Username (CPF Number )</th>
			            <th>Actions</th>
                        

			           
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->department['name'] }} </td>
			            <td class="hidden-xs"> {{ $v->section['name'] }} </td>
			            <td> {{ $v->name }} </td>
			            <td> {{ $v->username }} </td>
			             <td> <a href="{{ route('department_user.edit', Crypt::encrypt($v->id) ) }}" title="Edit Location">Edit</a>|
            <a onclick="return confirm('Are you sure you want to delete this Department ?');" href="{{ route('department_user.disable', Crypt::encrypt($v->id) ) }}" title="Remove Department"><i class="fa fa-trash"></i>Remove</a> | <a href="{{ route('chnage_department_user_password_admin', Crypt::encrypt($v->id) ) }}" title="Edit Location">Change Password</a></td>
			            
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
@section('pageJs') <script> load_sections(); </script> @stop