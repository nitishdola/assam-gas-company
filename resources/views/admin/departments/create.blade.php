@extends('layouts.admin')
@section('title') Add a Department @stop
@section('pageTitle') Add a Department @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'department.store', 'id' => 'department.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.departments._form')
			        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
			        {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
			<div class="col-xs-2"></div>
			<div class="col-xs-4 pull-right">
			<h3>Latest Entries</h3>
			@if(count($results))
			<table class="table table-striped table-bordered table-advance table-hover">
			  <thead>
			      <tr>
			          <th>
			              #
			          </th>
			          <th class="hidden-xs">
			              Department Name
			          </th>
			          <th>
			              Department Code
			          </th>

			         <!--  <th>
			              Created By
			          </th>
			          <th>
			              Creation Time
			          </th> -->
			          <th>Edit</th>
			          <!-- <th>Remove</th> -->
			      </tr>
			  </thead>
			  <tbody>
			  @foreach($results as $k => $v)
			   <td> {{ $k+1 }} </td>
			    <td class="hidden-xs"> {{ $v->name }} </td>
			    <td> {{ $v->department_code }} </td>
			    <!-- <td> {{ $v->creator['name'] }} </td>
			    <td> {{ date('d-m-Y', strtotime($v->created_at)) }} </td> -->
			    <td> <a href="{{ route('department.edit', Crypt::encrypt($v->id) ) }}" title="Edit Department">Edit</a>
			    </td>
			    <!-- <td> <a href="#" title="View Units">Remove </a> </td> -->
			  @endforeach
			  </tbody>
			</table>
			@else
			<h5> No entries yet </h5>
			@endif

			</div>
		</div>
	</div>
</div>
@endsection